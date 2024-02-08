<?php
/*
* Plugin Name : StripePaymentGateway
*
* Copyright (C) 2018 Subspire Inc. All Rights Reserved.
* http://www.subspire.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/


namespace Customize\Controller\Admin;

use Eccube\Common\EccubeConfig;
use Eccube\Controller\AbstractController;
use Eccube\Entity\Order;
use Eccube\Entity\Customer;
use Eccube\Repository\OrderRepository;
use Eccube\Repository\Master\OrderStatusRepository;
use Plugin\StripeRec\Repository\StripeRecOrderRepository;
use Plugin\StripePaymentGateway\Repository\StripeConfigRepository;
use Plugin\StripePaymentGateway\Entity\StripeCustomer;
use Plugin\StripePaymentGateway\Repository\StripeCustomerRepository;
use Plugin\StripePaymentGateway\Entity\StripeLog;
use Plugin\StripePaymentGateway\StripeClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Stripe\PaymentMethod;
use Symfony\Component\HttpFoundation\Request;

class StripePaymentController extends AbstractController
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * @var StripeConfigRepository
     */
    protected $stripeConfigRepository;

    /**
     * @var StripeRecOrderRepository
     */
    private $stripeRecOrderRepository;

    /**
     * @var StripeCustomerRepository
     */
    private $stripeCustomerRepository;

    /**
     * ConfigController constructor.
     *
     * @param EccubeConfig $eccubeConfig
     * @param OrderRepository $orderRepository
     * @param OrderStatusRepository $orderStatusRepository,
     * @param StripeConfigRepository $stripeConfigRepository
     * @param StripeRecOrderRepository $stripeRecOrderRepository
     * @param StripeCustomerRepository $stripeCustomerRepository
     */
    public function __construct(
        EccubeConfig $eccubeConfig,
        OrderRepository $orderRepository,
        OrderStatusRepository $orderStatusRepository,
        StripeConfigRepository $stripeConfigRepository,
        StripeRecOrderRepository $stripeRecOrderRepository,
        StripeCustomerRepository $stripeCustomerRepository
    )
    {
        $this->eccubeConfig=$eccubeConfig;
        $this->orderRepository = $orderRepository;
        $this->stripeConfigRepository = $stripeConfigRepository;
        $this->stripeRecOrderRepository = $stripeRecOrderRepository;
        $this->stripeCustomerRepository = $stripeCustomerRepository;
    }

    private function writeRequestLog(Order $order, $api) {
        $logMessage = '[Order' . $order->getId() . '][' . $api . '] リクエスト実行';
        log_info($logMessage);

        $stripeLog = new StripeLog();
        $stripeLog->setMessage($logMessage);
        $stripeLog->setCreatedAt(new \DateTime());
        $this->entityManager->persist($stripeLog);
    }

    private function writeResponseLog(Order $order, $api, $result) {
        $logMessage = '[Order' . $order->getId() . '][' . $api . '] ';
        if (is_object($result)) {
            $logMessage .= '成功';
        } elseif (! is_array($result)) {
            $logMessage .= print_r($result, true);
        } elseif (isset($result['error'])) {
            $logMessage .= $result['error']['message'];
        } else {
            $logMessage .= '成功';
        }
        log_info($logMessage);
        $stripeLog = new StripeLog();
        $stripeLog->setMessage($logMessage);
        $stripeLog->setCreatedAt(new \DateTime());
        $this->entityManager->persist($stripeLog);
    }

    /**
     * @Route("/%eccube_admin_route%/stripe_payment/order_payment/bulk_charge", name="stripe_payment_order_payment_bulk_charge", methods={"GET","POST"})
     */
    public function bulkCheckout(Request $request)
    {
        $this->isTokenValid();
        log_info('【追加決済】決済開始');

        $errors = 0;
        $success = 0;

        $ids = $request->get('ids');
        $amount = $request->get('amount');
        if(!isset($ids) || !isset($amount)) {
            $this->addError('注文が選択されていません。', 'admin');
            return $this->redirectToRoute('admin_order');
        }

        foreach ($ids as $order_id) {
            $Order = $this->orderRepository->find($order_id);

            //BOC check if order exist
            /** @var Order $Order */
            if (null === $Order) {
                log_error('【追加決済】Order not found');
                $errors++;
                continue;
            }

            $StripeConfig = $this->stripeConfigRepository->getConfigByOrder($Order);

            //BOC retrieve and check if captured for order_id already
            $stripeClient = new StripeClient($StripeConfig->secret_key);

            //BOC check if Stripe Order
            $stripeOrder = $this->stripeRecOrderRepository->findOneBy(array('Order' => $Order));
            if (null === $stripeOrder) {
                log_error('【追加決済】Stripe Order not found', [$Order->getId()]);
                $errors++;
                continue;
            }
            //EOC check if Stripe Order

            // check if Stripe Customer
            $Customer = $Order->getCustomer();
            $isEcCustomer = false;
            $isStripeCustomer = false;
            if ($Customer instanceof Customer) {
                $isEcCustomer = true;
                $StripeCustomer = $this->stripeCustomerRepository->findOneBy(array('Customer' => $Customer));
                if ($StripeCustomer instanceof StripeCustomer) {
                    $isStripeCustomer = true;
                }
            }
            // check if Stripe Customer

            // retrieve stripe customer id
            if ($isStripeCustomer) {
                $stripeCustomerId = $StripeCustomer->getStripeCustomerId();
            } else if (!$isEcCustomer && $stripeOrder->getStripeCustomerIdForGuestCheckout()) {
                $stripeCustomerId = $stripeOrder->getStripeCustomerIdForGuestCheckout();
            } else {
                log_error('【追加決済】Stripe Customer Id not found', [$StripeCustomer->getId()]);
                $errors++;
                continue;
            }
            // retrieve stripe customer id

            // capture payment
            $this->writeRequestLog($Order, 'retrieveLastPaymentMethodByCustomer');
            $stripePaymentMethodObj = $stripeClient->retrieveLastPaymentMethodByCustomer($stripeCustomerId);
            $this->writeResponseLog($Order, 'retrieveLastPaymentMethodByCustomer', $stripePaymentMethodObj);
            //EOC create payment intent

            //BOC check if error
            if( !($stripePaymentMethodObj instanceof PaymentMethod) || !$stripeClient->isPaymentMethodId($stripePaymentMethodObj->id) ) {
                if (is_array($stripePaymentMethodObj) && isset($stripePaymentMethodObj['error'])) {
                    $errorMessage = StripeClient::getErrorMessageFromCode($stripePaymentMethodObj['error'], $this->eccubeConfig['locale']);
    
                    log_error('【追加決済】Error Create Payment Method', [$errorMessage]);
                }
                $errors++;
                continue;
            } //EOC check if error
            
            //BOC create payment intent
            $this->writeRequestLog($Order, 'capturePaymentIntent');
            $newPaymentIntent = $stripeClient->createPaymentIntentWithCustomer(
                $amount, 
                $stripePaymentMethodObj, 
                'F'.$Order->getId(), 
                false,
                $stripeCustomerId,
                $Order->getCurrencyCode());
            $this->writeResponseLog($Order, 'createChargeWithCustomer', $newPaymentIntent);
            //EOC create payment intent

            //BOC check if error
            if (is_array($newPaymentIntent) && isset($newPaymentIntent['error'])) {
                $errorMessage = StripeClient::getErrorMessageFromCode($newPaymentIntent['error'], $this->eccubeConfig['locale']);

                log_error('【追加決済】Error Create Payment Intent', [$errorMessage]);
                $errors++;
                continue;
            } //EOC check if error

            //BOC capture payment
            $this->writeRequestLog($Order, 'capturePaymentIntent');
            $paymentIntent = $stripeClient->capturePaymentIntent($newPaymentIntent, $amount, $Order->getCurrencyCode());
            $this->writeResponseLog($Order, 'capturePaymentIntent', $paymentIntent);
            //EOC capture payment

            //BOC check if error
            if (is_array($paymentIntent) && isset($paymentIntent['error'])) {
                $errorMessage = StripeClient::getErrorMessageFromCode($paymentIntent['error'], $this->eccubeConfig['locale']);

                log_error('【追加決済】Error Capture Payment Method', [$errorMessage]);
                $errors++;
                continue;
            } //EOC check if error
            else {
                log_info('【追加決済】Create Payment successful');
                $success++;
                continue;
            }
        }

        log_info('【追加決済】決済完了');
        if ($success) {
            $this->addSuccess(trans('決済は%count%件を正常に完了しました。', ['%count%' => $success]), 'admin');
        }
        if ($errors) {
            $this->addError(trans('決済は%count%件を失敗しました。', ['%count%' => $errors]), 'admin');
        }

        if ($success == 0 && $errors == 0) {
            $this->addError('決済対象注文がありません。', 'admin');
        }

        return $this->redirectToRoute('admin_order');
    }

    /**
     * @Route("/%eccube_admin_route%/stripe_payment/order_payment/bulk_refund", name="stripe_payment_order_payment_bulk_refund", methods={"GET","POST"})
     */
    public function bulkRefund(Request $request)
    {
        $this->isTokenValid();
        log_info('【返金】返金開始');

        $errors = 0;
        $success = 0;

        $ids = $request->get('ids');
        $refund_amount = $request->get('amount');
        if(!isset($ids) || !isset($refund_amount)) {
            $this->addError('注文が選択されていません。', 'admin');
            return $this->redirectToRoute('admin_order');
        }

        foreach ($ids as $order_id) {
            $Order = $this->orderRepository->find($order_id);

            //BOC check if order exist
            /** @var Order $Order */
            if (null === $Order) {
                log_error('【返金】Order not found');
                $errors++;
                continue;
            }
            //EOC check if order exist

            $StripeConfig = $this->stripeConfigRepository->getConfigByOrder($Order);

            //BOC retrieve and check if captured for order_id already
            $stripeClient = new StripeClient($StripeConfig->secret_key);

            //BOC check if Stripe Order
            $stripeOrder = $this->stripeRecOrderRepository->findOneBy(array('Order' => $Order));
            if (null === $stripeOrder) {
                log_error('【返金】Stripe Order not found', [$Order->getId()]);
                $errors++;
                continue;
            }
            //EOC check if Stripe Order

            //BOC check if Stripe last charge id
            if (null === $stripeOrder->getLastChargeId()) {
                log_error('【返金】Stripe last charge is null', [$Order->getId()]);
                $errors++;
                continue;
            }
            //EOC check if Stripe last charge id

            //BOC retrieve and check if valid charge id and not already refunded
            $chargeForOrder = $stripeClient->retrieveCharge($stripeOrder->getLastChargeId());
            if (isset($chargeForOrder)) {
                if ($chargeForOrder->refunded) {
                    log_error('【返金】Stripe Charge is refunded', [$stripeOrder->getLastChargeId()]);
                    $errors++;
                    continue;
                }
            } else {
                log_error('【返金】Stripe Charge not found', [$stripeOrder->getLastChargeId()]);
                $errors++;
                continue;
            }
            //EOC retrieve and check if valid charge id and not already refunded

            //BOC partial refund
            if (empty($refund_amount) || !is_int($refund_amount+0)) {
                log_error('【返金】Amount invalid', [' amount: ' . $refund_amount]);
                $errors++;
                continue;
            } else if($refund_amount>$chargeForOrder['amount']){
                log_error('【返金】Amount invalid', [' amount: ' . $refund_amount]);
                $errors++;
                continue;
            }
            //EOC partial refund

            //BOC refund payment
            $this->writeRequestLog($Order, 'createRefundForCharge');
            $chargeResult = $stripeClient->createRefund($stripeOrder->getLastChargeId(),$refund_amount,$Order->getCurrencyCode());
            $this->writeResponseLog($Order, 'createRefundForCharge', $chargeResult);
            //EOC refund payment

            //BOC check if error
            if (is_array($chargeResult) && isset($chargeResult['error'])) {
                $errorMessage = StripeClient::getErrorMessageFromCode($chargeResult['error'], $this->eccubeConfig['locale']);

                log_error('【返金】', [$errorMessage]);
                $errors++;
                continue;
            }

            log_info('【返金】Refund successful',  [' order_id: ' . $Order->getId()]);
            $success++;
            continue;
        }

        log_info('【返金】返金完了');
        if ($success) {
            $this->addSuccess(trans('返金は%count%件を正常に完了しました。', ['%count%' => $success]), 'admin');
        }
        if ($errors) {
            $this->addError(trans('返金は%count%件を失敗しました。', ['%count%' => $errors]), 'admin');
        }

        if ($success == 0 && $errors == 0) {
            $this->addError('返金対象注文がありません。', 'admin');
        }

        return $this->redirectToRoute('admin_order');
    }
}
