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

namespace Customize\Controller\Mypage;

use Carbon\Carbon;
use Customize\Service\ReceiptPdfService;
use Eccube\Controller\AbstractController;
use Eccube\Entity\BaseInfo;
use Eccube\Entity\Customer;
use Eccube\Entity\Order;
use Eccube\Entity\Product;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Exception\CartException;
use Eccube\Form\Type\Front\CustomerLoginType;
use Eccube\Repository\BaseInfoRepository;
use Eccube\Repository\CustomerFavoriteProductRepository;
use Eccube\Repository\OrderRepository;
use Eccube\Repository\ProductRepository;
use Eccube\Service\CartService;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Plugin\StripeRec\Repository\StripeRecOrderRepository;
use Eccube\Controller\Mypage\MypageController as MypageMypageController;
use Stripe\Subscription;
use Stripe\Invoice;
use Stripe\Charge;

class MypageController extends MypageMypageController
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var CustomerFavoriteProductRepository
     */
    protected $customerFavoriteProductRepository;

    /**
     * @var BaseInfo
     */
    protected $BaseInfo;

    /**
     * @var CartService
     */
    protected $cartService;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * @var PurchaseFlow
     */
    protected $purchaseFlow;

    /**
     * @var StripeRecOrderRepository
     */    
    protected $stripeRecOrderRepository;

    /**
     * @var ReceiptPdfService
     */    
    protected $receiptPdfService;

    /**
     * MypageController constructor.
     *
     * @param OrderRepository $orderRepository
     * @param CustomerFavoriteProductRepository $customerFavoriteProductRepository
     * @param CartService $cartService
     * @param BaseInfoRepository $baseInfoRepository
     * @param PurchaseFlow $purchaseFlow
     * @param StripeRecOrderRepository $stripeRecOrderRepository
     * @param ReceiptPdfService $receiptPdfService
     */
    public function __construct(
        OrderRepository $orderRepository,
        CustomerFavoriteProductRepository $customerFavoriteProductRepository,
        CartService $cartService,
        BaseInfoRepository $baseInfoRepository,
        PurchaseFlow $purchaseFlow,
        StripeRecOrderRepository $stripeRecOrderRepository,
        ReceiptPdfService $receiptPdfService
    ) {
        $this->orderRepository = $orderRepository;
        $this->customerFavoriteProductRepository = $customerFavoriteProductRepository;
        $this->BaseInfo = $baseInfoRepository->get();
        $this->cartService = $cartService;
        $this->purchaseFlow = $purchaseFlow;
        $this->stripeRecOrderRepository = $stripeRecOrderRepository;
        $this->receiptPdfService = $receiptPdfService;
    }

    /**
     * マイページ.
     *
     * @Route("/mypage/", name="mypage", methods={"GET"})
     * @Template("Mypage/index.twig")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $Customer = $this->getUser();

        // 購入処理中/決済処理中ステータスの受注を非表示にする.
        $this->entityManager
            ->getFilters()
            ->enable('incomplete_order_status_hidden');

        // paginator
        $qb = $this->orderRepository->getQueryBuilderByCustomer($Customer);

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
        $paginations = clone $pagination;
        foreach ($pagination as $key => $value) {
            if (isset($value['subscriptionId']) && $value['subscriptionId'] != '') {
                try {
                    $invoices = Invoice::all(['subscription' => $value['subscriptionId']]);
                    $value['invoices'] = $invoices;
                    $paginations[$key] = $value;
                } catch (\Exception $e) {
                    $value['invoices'] = [];
                    $paginations[$key] = $value;
                    continue;
                }
                 
            }
        }
        
        return [
            'pagination' => $paginations,
        ];
    }

    /**
     * my_page_download_pdf_receipt
     * @Route("/mypage/download-pdf/{id}/receipt", name="my_page_download_pdf_receipt")     
     */
    public function downloadPdfReceipt(Request $request, $id = null)
    {
        try {
            if ($id) {
                // $subscription = Subscription::retrieve($id);
            
                // $latestInvoice = $subscription->latest_invoice;
        
                $invoice = Invoice::retrieve($id);
        
                $stripeCharge = Charge::retrieve($invoice->charge);
                $receiptUrl = $stripeCharge->receipt_url;
                $html = file_get_contents($receiptUrl);
                $dom = new \DOMDocument();
                $dom->loadHTML($html);
                $receiptsInvocesUrlCheck = 'https://dashboard.stripe.com/receipts/invoices/';
                $receiptsInvocesUrl = null;
                foreach($dom->getElementsByTagName("a") as $each_node) {
                    if ($each_node->getAttribute('href') && str_contains($each_node->getAttribute('href'), $receiptsInvocesUrlCheck)) {
                        $receiptsInvocesUrl = $each_node->getAttribute('href');
                        break;
                    }
                }

                if ($receiptsInvocesUrl) {
                    return $this->redirect($receiptsInvocesUrl);

                } else {
                    return $this->redirect($this->generateUrl('mypage'));
                }
            } else {
                return $this->redirect($this->generateUrl('mypage'));
            }
        } catch (\Exception $e) {
            return $this->redirect($this->generateUrl('mypage'));
        }
    }

    /**
     * @Route("/mypage/download-pdf/{id}/receipt_download", name="my_page_download_pdf_receipt_download")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function exportPdfPdfReceiptDownload(Request $request, $id = null)
    {
        if ($id) {
            $receiptPdfServiceDL = clone $this->receiptPdfService;

            $invoice = Invoice::retrieve($id);
            $stripeCharge = Charge::retrieve($invoice->charge);
            if ($stripeCharge->receipt_number == null) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $stripeCharge->receipt_url); //set url
                curl_setopt($ch, CURLOPT_HEADER, true); //get header
                curl_setopt($ch, CURLOPT_NOBODY, true); //do not include response body
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //do not show in browser the response
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //follow any redirects
                curl_exec($ch);
                curl_close($ch);

                $stripeCharge = Charge::retrieve($invoice->charge);
            }
            
            $order = $this->stripeRecOrderRepository->findBy(['subscription_id' => $invoice->subscription]);
            if (sizeof($order)>0) {
                log_info('Unable to create pdf files! Process have problems!');

                $response = new Response(
                    'admin.order.export.pdf.download.failure',
                    400,
                    ['content-type' => 'application/json']
                );
            }
            // 購入情報からPDFを作成する
            $arrData = [
                'invoice' => $invoice,
                'stripeCharge' => $stripeCharge,
                'order' => $order[0],
            ];
            $status = $receiptPdfServiceDL->makePdfOrder($arrData);

            // 異常終了した場合の処理
            if (!$status) {
                // $this->addError('admin.order.export.pdf.download.failure', 'admin');
                log_info('Unable to create pdf files! Process have problems!');

                $response = new Response(
                    'admin.order.export.pdf.download.failure',
                    400,
                    ['content-type' => 'application/json']
                );
            }

            // TCPDF::Outputを実行するとプロパティが初期化されるため、ファイル名を事前に取得しておく
            $pdfFileName = $receiptPdfServiceDL->getPdfOrderFileName();

            // ダウンロードする
            $response = new Response(
                $receiptPdfServiceDL->outputPdf(),
                200,
                ['content-type' => 'application/pdf']
            );

            $response->headers->set('Content-Disposition', 'attachment; filename="'.$pdfFileName.'"');

            // log_info('OrderPdf download success!', ['Order ID' => implode(',', $request->get('ids', []))]);

            return $response;
        }
        $response = new Response(
            'admin.order.export.pdf.download.failure',
            400,
            ['content-type' => 'application/json']
        );

        return $response;

    }
}
