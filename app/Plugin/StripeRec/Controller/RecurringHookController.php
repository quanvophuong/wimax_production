<?php
/*
* Plugin Name : StripeRec
*
* Copyright (C) 2020 Subspire. All Rights Reserved.
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Plugin\StripeRec\Controller;
if( \file_exists(dirname(__FILE__).'/../../StripePaymentGateway/vendor/stripe/stripe-php/init.php')) {
    include_once(dirname(__FILE__).'/../../StripePaymentGateway/vendor/stripe/stripe-php/init.php');
}

use Plugin\StripePaymentGateway\Entity\StripeConfig;
use Stripe\Webhook;
use Eccube\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Plugin\StripeRec\Entity\StripeCustomer;
use Plugin\StripeRec\Entity\StripeRecOrder;
use Plugin\StripeRec\Entity\StripeRecOrderItem;
use Plugin\StripeRec\Service\RecurringService;
use Eccube\Entity\Order;
use Eccube\Entity\Master\OrderStatus;
use Eccube\Service\MailService;
use Eccube\Common\EccubeConfig;

class RecurringHookController extends AbstractController{

    protected $container;
    /**
     * エンティティーマネージャー
     */
    private $em;

    private $rec_order_repo;

    private $config_service;
    private $mail_service;
    private $rec_service;
    private $stripe_service;
    private $invoice_stamp_dir;
    protected $eccubeConfig;

    const LOG_IF = "rmaj111---";


    public function __construct(ContainerInterface $container, MailService $mail_service, EccubeConfig $eccubeConfig){
        $this->container = $container;       
        $this->em = $container->get('doctrine.orm.entity_manager'); 
        $this->rec_order_repo = $this->em->getRepository(StripeRecOrder::class);
        $this->config_service = $container->get("plg_stripe_rec.service.admin.plugin.config");
        $this->mail_service = $mail_service;
        $this->rec_service = $container->get("plg_stripe_rec.service.recurring_service");
        $this->stripe_service = $container->get("plg_stripe_rec.service.stripe_service");

        $this->eccubeConfig = $eccubeConfig;
        $this->invoice_stamp_dir = $this->eccubeConfig->get('kernel.project_dir') . "/var/invoice_stamp";
        if ( !\is_dir($this->invoice_stamp_dir) ) {
          \mkdir($this->invoice_stamp_dir);
        }
    }
    /**
     * @Route("/plugin/StripeRec/webhook", name="plugin_stripe_rec_webhook")
     */
    public function webhook(Request $request){
    	log_info("==============[webhook strart] ======");
        $signature = $this->config_service->getSignature();
        if($signature){
            try{
                log_info("=============[webhook sign started] 0============\n");
                log_info("current_sign : $signature");
                $event = Webhook::constructEvent(
                    $request->getContent(), 
                    $request->headers->get('stripe-signature'),
                    $signature
                );
                // die();
                
                $type = $event['type'];
                $object = $event['data']['object'];
                log_info("webhook_type : $type");
            }catch(Exception $e){
                
                log_error("=============[webhook sign error]============\n" );
                return $this->json(['status' => 'failed']);
            }
        }else{
            log_info("=============[webhook processing without sign]============");
            $data = $request->query->all();
            $type = $data['type'];
            $object = $data['data']['object'];
        }
        log_info("==============[webhook object] $type ======");

        //dump($type);die();
        switch ($type) {
            case 'invoice.payment_succeeded':
              // log_info('🔔 ' . $type . ' Webhook received! ' . $object);            
              // if ($this->paidDebounce($object)) {
              //   $this->rec_service->invoicePaid($object);
              // }
              break;
            case 'invoice.paid':
              //log_info('🔔 ' . $type . ' Webhook received! ' . $object);            

              //if ($this->paidDebounce($object)) {
                $this->rec_service->invoicePaid($object);
              //}
              break;
            case 'invoice.payment_failed':
              // If the payment fails or the customer does not have a valid payment method,
              // an invoice.payment_failed event is sent, the subscription becomes past_due.
              // Use this webhook to notify your user that their payment has
              // failed and to retrieve new card details.
              log_info('🔔 ' . $type . ' Webhook received! ' . $object);
//               $this->rec_service->invoiceFailed($object);
              $this->invoiceFailed($object);
              log_info('🔔 ' . $type . ' Webhook end! ');
              break;
            case 'invoice.upcoming':
                log_info('🔔 ' . $type . ' Webhook received! ' . $object);
                $this->rec_service->invoiceUpcoming($object);
                break;
            case 'invoice.finalized':
              //If you want to manually send out invoices to your customers
              //or store them locally to reference to avoid hitting Stripe rate limits.
                log_info('🔔 ' . $type . ' Webhook received! ' . $object);
                if ($this->paidDebounce($object)) {
                  //$this->rec_service->invoicePaid($object);
                }
              break;
            case 'customer.subscription.deleted':
              // handle subscription cancelled automatically based
              // upon your subscription settings. Or if the user
              // cancels it.
              log_info('🔔 ' . $type . ' Webhook received! ' . $object);
              $this->rec_service->recurringCanceled($object);
              break;
            case 'customer.subscription.trial_will_end':
              // Send notification to your user that the trial will end
              log_info('🔔 ' . $type . ' Webhook received! ' . $object);
              break;
            case 'customer.subscription.updated':
                log_info('🔔 ' . $type . ' Webhook received! ' . $object);      
                $this->rec_service->subscriptionUpdated($object);
              break;
            // ... handle other event types
            // case 'checkout.session.completed':
            //     log_info('🔔 ' . $type . ' Webhook received! ' . $object);    
            //     $this->rec_service->completeOrder($object);            
            //     break;
            case 'customer.subscription.created':
                log_info('🔔 ' . $type . ' Webhook received! ' . $object);

                $stripeRepo = $this->entityManager->getRepository(StripeConfig::class);
                $stripeConfig = $stripeRepo->findOneBy([],['id' => 'desc']);

                $this->rec_service->subscriptionCreated($object,$stripeConfig->getSecretKey());
            break;
            case 'subscription_schedule.canceled':
                log_info('🔔 ' . $type . ' Webhook received! ' . $object);
                $this->rec_service->subscriptionScheduleCanceled($object);
                break;
            case 'payment_intent.canceled':
            	log_info('🔔 ' . $type . ' Webhook received! ' . $object);
//             	$this->rec_service->subscriptionScheduleCanceled($object);
            	break;
            case 'payment_method.attached':
                log_info('🔔 ' . $type . ' Webhook received! ' . $object);
                $this->rec_service->paymentMethodAttached($object);
            break;
            default:
              // Unhandled event type
          }
        
        return $this->json(['status' => 'success']);
    }
    
    private function paidDebounce($object) 
    {
      $file = $this->invoice_stamp_dir . "/" . $object->id;

      log_info(self::LOG_IF . $file);
      $now = new \DateTime();
      $now = $now->getTimestamp();
      if (!\file_exists($file)) {
        \file_put_contents($file, $now);
        return true;
      }

      $old = \file_get_contents($file);
      $res = ($now - $old > 1000 * 30 );
      \file_put_contents($file, $now);
      return $res;
    }
    
    
    private function invoiceFailed($object){
    	log_info("==============" . __METHOD__ . " ======");
    	$customer = $object->customer;
    	$data = $object->lines->data;
    	
    	$subscriptions = [];
    	log_info("==============[webhook_invoiceFailed] data foreach ======");
    	foreach($data as $item){
    		
    		log_info("==============[webhook_invoiceFailed] data foreach subscription ======");
    		if(!empty($item->subscription)){
    			log_info("==============[webhook_invoiceFailed] data foreach subscription exists ======");
    			if(!in_array($item->subscription, array_keys($subscriptions))){
    				if(count($subscriptions) === 0){
    					$subscriptions[$item->subscription] = [];
    				}
    				
    				$rec_order = $this->createOrUpdateRecOrder(
    						StripeRecOrder::STATUS_PAY_FAILED,
    						$item,
    						$customer,
    						$this->convertDateTime($object->created)
    						);
    				$rec_order->setFailedInvoice($object->id);
    				$this->em->persist($rec_order);
    				$this->em->flush();
    				
    				$subscriptions[$item->subscription] = $rec_order;
    				
    				if(!empty($object->charge) && $object->charge != $rec_order->getLastChargeId()){
    					$rec_order->setLastChargeId($object->charge);
    					$rec_order->setLastPaymentDate(new \DateTime());
    					$this->em->persist($rec_order);
    				}
    				$rec_order->setInvoiceData($object);
    			}else{
    				$rec_order = $this->rec_order_repo->findOneBy([
    						'subscription_id' => $item->subscription,
    						'stripe_customer_id' => $customer]);
    			}
    			$rec_item = $this->em->getRepository(StripeRecOrderItem::class)->getByOrderAndPriceId($rec_order, $item->price->id);
    			if(!empty($rec_item)){
    				$rec_item->setPaidStatus(StripeRecOrder::STATUS_PAY_FAILED);
    				$this->em->persist($rec_item);
    			}
    			$this->em->flush();
    			$rec_order->addInvoiceItem($item);
    			
    			log_info("==============[webhook_invoiceFailed] data foreach subscription end ======");
    		}
    	}
    	log_info("==============[webhook invoiceFailed] subsctiptions ======" . print_r($subscriptions, true));
    	foreach($subscriptions as $sub_id => $rec_order){
    		$order = $rec_order->getOrder();
    		if($order->getOrder()){
    			if (!$this->hasOverlappedPaidOrder($rec_order)) {
    				log_info("==============[webhook invoiceFailed] OrderStatus::FAILED ======");
    				$Order = $this->updateOrder($rec_order, OrderStatus::FAILED);
    				// $this->dispatcher->dispatch(StripeRecEvent::REC_ORDER_SUBSCRIPTION_PAID, new EventArgs([
    				//     'rec_order' =>  $rec_order,
    				// ]));
    			}
    			
    			$this->sendMail($rec_order, "invoice.failed");
    		}
    		
    		$rec_order = $this->checkScheduledStatus($rec_order, StripeRecOrder::REC_STATUS_ACTIVE);
    		$this->em->persist($rec_order);
    		$this->em->flush();
    	}
    }
    
    
    private function createOrUpdateRecOrder($paid_status, $item, $stripe_customer_id, $last_payment_date = null){
    	log_info(RecurringService::LOG_IF . "createOrUpdateRecOrder");
    	$sub_id = $item->subscription;
    	$rec_order = $this->rec_order_repo->findOneBy(['subscription_id' => $sub_id, "stripe_customer_id" => $stripe_customer_id]);
    	if(empty($rec_order)){
    		
    		log_info(RecurringService::LOG_IF . "rec order is empty in webhook");
    		$rec_order = new StripeRecOrder;
    		$rec_order->setSubscriptionId($sub_id);
    		$rec_order->setStripeCustomerId($stripe_customer_id);
    		
    		$stripe_customer = $this->em->getRepository(StripeCustomer::class)->findOneBy(['stripe_customer_id' => $stripe_customer_id]);
    		if($stripe_customer){
    			$customer = $stripe_customer->getCustomer();
    			if($customer){
    				$rec_order->setCustomer($customer);
    			}
    		}
    	}
    	log_info(RecurringService::LOG_IF . "rec order is not empty in");
    	
    	$dt = new \DateTime();
    	$dt->setTimestamp($item->period->end);
    	$dt->modify('first day of this month');
    	
    	$rec_order->setCurrentPeriodStart($this->convertDateTime($item->period->start));
    	$rec_order->setCurrentPeriodEnd($this->convertDateTime($dt->getTimestamp()));
    	
    	$rec_order->setPaidStatus($paid_status);
    	if(!empty($last_payment_date)){
    		$rec_order->setLastPaymentDate($last_payment_date);
    	}
    	if($paid_status == StripeRecOrder::STATUS_PAID){
    		$rec_order->setInterval($item->plan->interval);
    	}
    	
    	$rec_items = $rec_order->getOrderItems();
    	if(!empty($rec_items)){
    		foreach($rec_items as $rec_item){
    			$rec_item->setPaidStatus(StripeRecOrder::STATUS_PAY_UNDEFINED);
    		}
    	}
    	$this->em->persist($rec_order);
    	$this->em->flush();
    	$this->em->commit();
    	
    	$order = $rec_order->getOrder();
    	log_info("Recurring---orderDate---" );
    	if($order){
    		$Today = new \DateTime();
    		// $order->setOrderDate($this->convertDateTime($Today->getTimestamp()));
    		if(empty($order->getRecOrder())){
    			$order->setRecOrder($rec_order);
    			log_info("Recurring---orderDate---" );
    			log_info($order->getOrderDate());
    			$this->em->persist($order);
    			$this->em->commit();
    		}
    	}
    	
    	return $rec_order;
    }
}