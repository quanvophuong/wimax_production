<?php

namespace Customize\Controller;

use Eccube\Controller\AbstractController;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Entity\Customer;
use Eccube\Form\Type\Front\EntryType;
use Eccube\Repository\CustomerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Stripe\Charge;
use Stripe\Customer as StripeCustomer;
use Stripe\Exception\CardException;
use Stripe\Stripe;

use Plugin\StripePaymentGateway\StripeClient;
use Plugin\StripePaymentGateway\Repository\StripeConfigRepository;
use Plugin\StripePaymentGateway\Entity\StripeCustomer as EccubeStripeCustomer;
use Plugin\StripeRec\Service\MailExService;

class CreditController extends AbstractController{
    /**
     * @var TokenStorage
     */
    protected $tokenStorage;

    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * @var EncoderFactoryInterface
     */
    protected $encoderFactory;
    protected $stripeConfigRepository;
    private $mailService;

    public function __construct(
        CustomerRepository $customerRepository,
        EncoderFactoryInterface $encoderFactory,
        TokenStorageInterface $tokenStorage,
        StripeConfigRepository $stripeConfigRepository,
    		MailExService $mailService
    ) {
        $this->customerRepository = $customerRepository;
        $this->encoderFactory = $encoderFactory;
        $this->tokenStorage = $tokenStorage;
        $this->stripeConfigRepository = $stripeConfigRepository;
        $this->mailService = $mailService;
    }

    /**
     * EC-CUBE標準の「カート追加」を上書き
     *
     * @Route("/creditcard/pay", name="card_pay", methods={"POST"})
     */

    public function payCard(Request $request){
        $stripeToken = $request->request->get('stripeToken');
        $price = $request->request->get('price');
        Stripe::setApiKey('sk_test_51HPQf3I7V9uu8qK5OHju6fKppm2FqoCEDNXTYkI0NsUAzROEZ2jnIarmzVihrATiSnnkFgps9m0RshDMgD6wvjYS00LXJ4wIPI');
        $cus_id = null;
        $error = null;
        try {
            $customer = StripeCustomer::create([
                'email' => 'test@wimax.com',
                'source' => $stripeToken
            ]);
            $cus_id = $customer->id;

        } catch (CardException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $error = 'Customer ' . $request->email . ': error: ' . $err['code'];
            return $this->json([
                'done' => true,
                'message_1' => $error,
            ]);
        } catch (\Exception $e) {
            $error = 'Stripe Api Issue :' . $e->getCode();
            return $this->json([
                'done' => true,
                'message_2' => $error,
            ]);
        }

        try {
            $customerInfo = StripeCustomer::retrieve($cus_id);
            //$cardinfo = $customerInfo->sources->data;
            //$card_number = $cardinfo[0]->id;
            //$countryCode = $cardinfo[0]->country;
            //$card = $customerInfo->sources->retrieve($card_number);
            //$card->name = $name;
            //$card->save();


        } catch (CardException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $error = 'Customer ' . ': error: ' . $err['code'];
            return $this->json([
                'done' => true,
                'message_3' => $error,
            ]);
        } catch (\Exception $e) {
            $error = 'Stripe Api Issue :' . $e->getCode();
            return $this->json([
                'done' => true,
                'message_4' => $error,
            ]);
        }
        if ($error != null) {
            $cu = StripeCustomer::retrieve($cus_id);
            $cu->delete();
            return $this->json([
                'done' => true,
                'message_5' => $error,
            ]);


        }

        try {
            $charge = Charge::create([
                "amount" => $price,
                "currency" => "JPY",
                "customer" => $cus_id,
                "capture" => false,
                'description' => "Buying Chips"
            ]);

            $source = $charge->source;

            $ch_id = $charge->id;
            $status = $charge->status;
            $payment_method = $charge->payment_method;
            $out = $charge->outcome;
            if ($out->reason == 'elevated_risk_level') {
                                        $error = 'Your card was declined. Please try with another card';
            } else if ($out->reason == 'highest_risk_level') {
                                        $error = 'Your card was declined. Please try with another card';
            } else if ($out->reason == 'merchant_blacklis') {
                                        $error = 'Your card was declined. Please try with another card';
            } else if ($source->funding == 'prepaid') {
                                        $error = 'Sorry, but we dont allow prepaid Cards. Please use a credit / debit valid card';
            }

            if ($error != null) {
                $cu = StripeCustomer::retrieve($cus_id);
                $cu->delete();

                return $this->json([
                    'done' => true,
                    'message_6' => $error,
                ]);
            }

        } catch (CardException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $error = 'Customer ' . ': error: ' . $err['code'];
            return $this->json([
                'done' => true,
                'message_7' => $error,
            ]);
        } catch (\Exception $e) {
            $error = 'The card validation cant be executed at this moment. Please retry later';
            return $this->json([
                'done' => true,
                'message_8' => $error,
            ]);
        }
        if ($error != null) {
            $cu = StripeCustomer::retrieve($cus_id);
            $cu->delete();
            return $this->json([
                'done' => true,
                'message_9' => $error,
            ]);
        }

        return $this->json([
             'done' => true,
             'status' => 'success',
        ]);
    }
    /**
     * EC-CUBE標準の「カート追加」を上書き
     *
     * @Route("/creditcard/change", name="card_change", methods={"POST"})
     */
    public function changeCard(Request $request){
    	log_info(__METHOD__ . ' start');
        $Customer = $this->getUser();

        
        $StripeConfig = $this->stripeConfigRepository->get();
        $stripeClient = new StripeClient($StripeConfig->secret_key);


        $StripeCustomer = $this->entityManager->getRepository(EccubeStripeCustomer::class)->findOneBy(['Customer'=>$Customer]);
//         dump($StripeCustomer);die();

        $LoginCustomer = clone $Customer;
        $this->entityManager->detach($LoginCustomer);
        $previous_password = $Customer->getPassword();
        /* @var $builder \Symfony\Component\Form\FormBuilderInterface */
        $builder = $this->formFactory->createBuilder(EntryType::class, $Customer);

        $event = new EventArgs(
            [
                'builder' => $builder,
                'Customer' => $Customer,
            ],
            $request
        );
        


        $this->eventDispatcher->dispatch(EccubeEvents::FRONT_MYPAGE_CHANGE_INDEX_INITIALIZE, $event);

        /* @var $form \Symfony\Component\Form\FormInterface */
        $form = $builder->getForm();
        $form->handleRequest($request);

        /*$data = $form->getData();
        assert($data instanceof Customer);*/

        $Customer->setCardNumber($Customer->getCardNumber());

        log_info('クレジットカード編集開始',
                    [
                        'card_number' => $previous_password,
                    ]);

        $this->entityManager->flush();

        log_info('クレジットカード編集完了');

        $event = new EventArgs(
            [
                'form' => $form,
                 'Customer' => $Customer,
            ],
            $request
        );
        $this->eventDispatcher->dispatch(EccubeEvents::FRONT_MYPAGE_CHANGE_INDEX_COMPLETE, $event);

        return $this->json([
                        'done' => true,
                        'messages' => "success",
                    ]);
     }

    /**
     * EC-CUBE標準の「カート追加」を上書き
     *
     * @Route("/user_data/my_credit", name="my_credit", methods={"GET"})
     */
     public function myCredit(Request $request){
     	log_info(__METHOD__ . ' start');
         $Customer = $this->getUser();
         return [
                     'Customer' => $Customer,
                 ];

     }

     /**
     * EC-CUBE標準の「カート追加」を上書き
     *
     * @Route("/user_data/creditcard", name="creditcard", methods={"GET"})
     */
     public function creditCard(Request $request){
        $price = $request->query->get('price');
        $token = $request->query->get('token');
        log_info('[注文確認]', [$price]);
        // 受注の存在チェック
        $preOrderId = $this->cartService->getPreOrderId();
        $Order = $this->orderHelper->getPurchaseProcessingOrder($preOrderId);
        log_info('[注文確認]', [$preOrderId]);
        if (!$Order) {
            log_info('[注文確認] 購入処理中の受注が存在しません.', [$preOrderId]);

            return $this->redirectToRoute('shopping_error');
        }

        $form = $this->createForm(OrderType::class, $Order);
        $form->handleRequest($request);

        log_info('[注文確認] 集計処理を開始します.', [$Order->getId()]);
        $response = $this->executePurchaseFlow($Order);
        $this->entityManager->flush();

     }

    /**
     * EC-CUBE標準の「カート追加」を上書き
     *
     * @Route("/user_data/thanks", name="user_thanks", methods={"GET"})
     */
     public function userThanks(Request $request){

     }
}