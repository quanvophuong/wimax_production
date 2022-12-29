<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Controller\Mypage;

use Eccube\Controller\AbstractController;
use Eccube\Entity\Master\CustomerStatus;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Repository\Master\CustomerStatusRepository;
use Eccube\Repository\PageRepository;
use Eccube\Service\CartService;
use Eccube\Service\MailService;
use Eccube\Service\OrderHelper;
use Eccube\Util\StringUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Knp\Component\Pager\PaginatorInterface;
use Eccube\Repository\OrderRepository;
use Customize\Repository\WithdrawRepository;
use Customize\Entity\Withdraw;
use Plugin\StripeRec\Repository\StripeRecOrderRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Plugin\StripePaymentGateway\Entity\StripeConfig;

class WithdrawController extends AbstractController
{
    /** @var OrderRepository */
    private $orderRepository;
    /**
     * @var MailService
     */
    protected $mailService;

    /**
     * @var CustomerStatusRepository
     */
    protected $customerStatusRepository;

    /**
     * @var TokenStorage
     */
    protected $tokenStorage;

    /**
     * @var CartService
     */
    private $cartService;

    /**
     * @var OrderHelper
     */
    private $orderHelper;

    /**
     * @var PageRepository
     */
    private $pageRepository;

    private $withdrawRepository;
    private $stripeRecOrderRepository;
    protected $rec_service;
    protected $container;

    /**
     * WithdrawController constructor.
     *
     * @param MailService $mailService
     * @param CustomerStatusRepository $customerStatusRepository
     * @param TokenStorageInterface $tokenStorage
     * @param CartService $cartService
     * @param OrderHelper $orderHelper
     * @param PageRepository $pageRepository
     */
    public function __construct(
        ContainerInterface $container,
        MailService $mailService,
        CustomerStatusRepository $customerStatusRepository,
        TokenStorageInterface $tokenStorage,
        CartService $cartService,
        OrderHelper $orderHelper,
        PageRepository $pageRepository,
        OrderRepository $orderRepository,
        WithdrawRepository $withdrawRepository,
        StripeRecOrderRepository $stripeRecOrderRepository
    ) {
        $this->mailService = $mailService;
        $this->customerStatusRepository = $customerStatusRepository;
        $this->tokenStorage = $tokenStorage;
        $this->cartService = $cartService;
        $this->orderHelper = $orderHelper;
        $this->pageRepository = $pageRepository;
        $this->orderRepository = $orderRepository;
        $this->withdrawRepository = $withdrawRepository;
        $this->stripeRecOrderRepository = $stripeRecOrderRepository;
        $this->rec_service = $container->get("plg_stripe_rec.service.recurring_service");
    }

    /**
     * 退会画面.
     *
     * @Route("/mypage/withdraw", name="mypage_withdraw", methods={"GET", "POST"})
     * @Route("/mypage/withdraw", name="mypage_withdraw_confirm", methods={"GET", "POST"})
     * @Template("Mypage/withdraw.twig")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $Customer = $this->getUser();

        // 購入処理中/決済処理中ステータスの受注を非表示にする.
        $this->entityManager
            ->getFilters()
            ->enable('incomplete_order_status_hidden');

        // paginator
        $qb = $this->orderRepository->getQueryBuilderInWithdrawList($Customer);

        $event = new EventArgs(
            [
                'qb' => $qb,
                'Customer' => $Customer,
            ],
            $request
        );
        $this->eventDispatcher->dispatch(EccubeEvents::FRONT_MYPAGE_MYPAGE_INDEX_SEARCH, $event);

        $pagination = $paginator->paginate(
            $qb,
            $request->get('pageno', 1),
            $this->eccubeConfig['eccube_search_pmax']
        );

        return [
            'pagination' => $pagination,
        ];
    }

    /**
     * 退会完了画面.
     *
     * @Route("/mypage/withdraw_complete", name="mypage_withdraw_complete", methods={"GET"})
     * @Template("Mypage/withdraw_complete.twig")
     */
    public function complete(Request $request)
    {
        return [];
    }


    /**
     *
     * @Route("/mypage/withdraw_request", name="mypage_withdraw_request", methods={"POST"})
     */
    public function requestSecret(Request $request)
    {
        $orderId = $request->get('order_id');
        $type = $request->get('withdraw_type');

        if (empty($orderId) || empty($type)){
            return $this->json([
                'done' => 'false',
                'message' => ''
            ]);
        }

        $withdrawType = $type == 'secret' ? 1 : 2;
        $Order = $this->orderRepository->find($orderId);
        $Withdraw = $this->withdrawRepository->findOneBy(array('Order' => $Order, 'withdraw_type' => $withdrawType));
        if (empty($Withdraw)){
            $Withdraw = new Withdraw();
            $Withdraw->setOrder($Order);
            $Withdraw->setWithdrawType($withdrawType);
            $Withdraw->setRequestDate(new \DateTime('now'));
            $Withdraw->setVisible(true);
            
            $this->entityManager->persist($Withdraw);
            $this->entityManager->flush();
        }else{
            $Withdraw->setRequestDate(new \DateTime('now'));
            $Withdraw->setVisible(true);
            
            $this->entityManager->persist($Withdraw);
            $this->entityManager->flush();
        }
        
        return $this->json([
            'done' => true
        ]);
    }

    /**
     *
     * @Route("/wimax_cron/excute/withdraw", name="wimax_excute_withdraw", methods={"GET", "POST"})
     */
    public function excuteWithdraw(){
        $Withdraws = $this->withdrawRepository->findBy(array('visible' => 1));
        foreach($Withdraws as $Withdraw){
            $withdrawType = $Withdraw->getWithdrawType();
            $Order = $Withdraw->getOrder();
            //if ($withdrawType == 1) $this->withdrawSecret($Order);
            if ($withdrawType == 2) $this->withdrawPlan($Order);
            $Withdraw->setVisible(false);
            $this->entityManager->persist($Withdraw);
        }
        $this->entityManager->flush();

        return $this->json(['done' => true]);
    }

    private function withdrawSecret($Order){
        $RecOrder = $this->stripeRecOrderRepository->findOneBy(array('Order' => $Order));
        $StripeConfig = $this->entityManager->getRepository(StripeConfig::class)->get();
        $stripe = new \Stripe\StripeClient(
            $StripeConfig->getSecretKey()
        );

        // $subscriptionId = $RecOrder->getSubscriptionId();
        // if (empty($subscriptionId)) return;

        //  $subscription = $stripe->subscriptions->retrieve($subscriptionId);

        //  $shcedule = $stripe->subscriptionSchedules->retrieve($subscription['schedule']);

        //  $item = $stripe->subscriptionItems->create([
        //     'subscription' => $subscription['id'],
        //     'price' => 'price_1M2mpAGS5e9lvq3n0LssWVqS',
        //     'quantity' => 1,
        //   ]);

        // $stripe->plans->update(
        //     'price_1M2mpAGS5e9lvq3n0LssWVqS',
        //     ['metadata' => ['order_id' => '6735']]
        //   );


        // $stripe->subscriptionSchedules->update(
        //     $shcedule['id'],
        //     ['phases' => $phases]
        //   );

        //   dump($shcedule['id']);die();

        // $subscription_items = [];
        //     $subscription_items[] = [
        //         'price' =>  'price_1M2mpAGS5e9lvq3n0LssWVqS',
        //         'quantity'  =>  1, // $order_item->getQuantity()
        //     ];

        // $add = $phases[count($phases)-1];

        // dump($add['items'][0]['plan']);die();
        // $add['items'][0]['plan'] = 'price_1M2mpAGS5e9lvq3n0LssWVqS';
        // $add['items'][0]['price'] = 'price_1M2mpAGS5e9lvq3n0LssWVqS';
        
        // dump($add);die();
    }

    private function withdrawPlan($Order){
        $RecOrder = $this->stripeRecOrderRepository->findOneBy(array('Order' => $Order));
        if(!empty($RecOrder)){
            $res = $this->rec_service->cancelRecurring($RecOrder);
            if(!empty($res)){
                $err_msg = $this->rec_service->getErrMsg();
                log_info("cancel subscription error : $err_msg");
            }else{
                log_info("success subscription stop : $err_msg");
            }

        }
    }
}
