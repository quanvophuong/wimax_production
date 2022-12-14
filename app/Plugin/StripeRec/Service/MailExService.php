<?php
/*
* Plugin Name : StripeRec
*
* Copyright (C) 2020 Subspire. All Rights Reserved.
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Plugin\StripeRec\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Plugin\StripeRec\Repository\StripeRecOrderRepository;
use Eccube\Entity\Order;
use Eccube\Entity\BaseInfo;
use Eccube\Entity\MailTemplate;
use Eccube\Entity\MailHistory;
use Plugin\StripeRec\Entity\StripeRecOrder;
use Plugin\StripeRec\Service\ConfigService;
use Eccube\Service\MailService;
use Eccube\Event\EventArgs;
use Plugin\StripeRec\Controller\RecurringHookController;
use Eccube\Repository\MailHistoryRepository;
use Eccube\Repository\MailTemplateRepository;
use Eccube\Repository\BaseInfoRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Eccube\Common\EccubeConfig;

class MailExService extends MailService{

    protected $container;
    protected $rec_order_repo;
    protected $em;


    public function __construct(
        ContainerInterface $container,
        \Swift_Mailer $mailer,
        MailTemplateRepository $mailTemplateRepository,
        MailHistoryRepository $mailHistoryRepository,
        BaseInfoRepository $baseInfoRepository,
        EventDispatcherInterface $eventDispatcher,
        \Twig_Environment $twig,
        EccubeConfig $eccubeConfig
    ){
        $this->container = $container;
        $this->em = $this->container->get('doctrine.orm.entity_manager');
        $this->rec_order_repo = $this->em->getRepository(StripeRecOrder::class);

        parent::__construct( $mailer, $mailTemplateRepository, $mailHistoryRepository, $baseInfoRepository, $eventDispatcher, $twig, $eccubeConfig);
    }

    public function sendPaidMail($rec_order){
        $template = $this->em->getRepository(MailTemplate::class)->findOneBy([
            'name'  =>  ConfigService::PAID_MAIL_NAME
        ]);
        $base_info = $this->em->getRepository(BaseInfo::class)->get();
        $template_path = $template->getFileName();

        $order = $this->em->getRepository(Order::class)->findOneBy(['recOrder' => $rec_order], ['id' => 'desc']);

        $param = ['rec_order' =>  $rec_order, "base_info" => $base_info, 'order' => $order];

        $engine = $this->container->get('twig');
        $body = $engine->render($template_path, $param, null);
        $htmlFileName = $this->getHtmlTemplate($template_path);

        $message = $this->initialMsg($rec_order, $template);

        $message->setBody($body);
        if($htmlFileName){
            $htmlBody = $this->twig->render($htmlFileName, $param);
            $message
                ->setContentType('text/plain; charset=UTF-8')
                ->setBody($body, 'text/plain')
                ->addPart($htmlBody, 'text/html');
        }
        $count = $this->mailer->send($message);
        log_info('?????????????????????????????????', ['count' => $count]);

        if ($order) {
            $MailHistory = new MailHistory();
            $MailHistory->setMailSubject($message->getSubject())
                ->setMailBody($message->getBody())
                ->setOrder($order)
                ->setSendDate(new \DateTime());
            $multipart = $message->getChildren();
            if (count($multipart) > 0) {
                $MailHistory->setMailHtmlBody($multipart[0]->getBody());
            }
            $this->em->persist($MailHistory);
            $this->em->flush();
        }
        return $message;
    }
    public function sendUpcomingMail($rec_order){
        $template = $this->em->getRepository(MailTemplate::class)->findOneBy([
            'name'  =>  ConfigService::PAY_UPCOMING
        ]);
        $base_info = $this->em->getRepository(BaseInfo::class)->get();
        $template_path = $template->getFileName();

        $param = ['rec_order' =>  $rec_order, "base_info" => $base_info];

        $engine = $this->container->get('twig');
        $body = $engine->render($template_path, $param, null);
        $htmlFileName = $this->getHtmlTemplate($template_path);

        $message = $this->initialMsgCustom($rec_order, $template, 'user_only', '');

        $message->setBody($body);
        if($htmlFileName){
            $htmlBody = $this->twig->render($htmlFileName, $param);
            $message
                ->setContentType('text/plain; charset=UTF-8')
                ->setBody($body, 'text/plain')
                ->addPart($htmlBody, 'text/html');
        }
        $count = $this->mailer->send($message);
        log_info('????????????upcoming?????????????????????', ['count' => $count]);

    }
    public function sendCancelMail($rec_order)
    {
        $template = $this->em->getRepository(MailTemplate::class)->findOneBy([
            'name'  =>  ConfigService::REC_CANCELED
        ]);
        $base_info = $this->em->getRepository(BaseInfo::class)->get();
        $template_path = $template->getFileName();

        $param = ['rec_order' =>  $rec_order, "base_info" => $base_info];

        $engine = $this->container->get('twig');
        $body = $engine->render($template_path, $param, null);
        $htmlFileName = $this->getHtmlTemplate($template_path);

        $message = $this->initialMsgCustom($rec_order, $template, 'admin_only', 'info@free-max.com');

        $message->setBody($body);
        if($htmlFileName){
            $htmlBody = $this->twig->render($htmlFileName, $param);
            $message
                ->setContentType('text/plain; charset=UTF-8')
                ->setBody($body, 'text/plain')
                ->addPart($htmlBody, 'text/html');
        }
        $count = $this->mailer->send($message);
        log_info('????????????CANCELED?????????????????????', ['count' => $count]);

    }
    public function sendFailedMail($rec_order)
    {
        $template = $this->em->getRepository(MailTemplate::class)->findOneBy([
            'name'  =>  ConfigService::PAY_FAILED_MAIL_NAME
        ]);
        $base_info = $this->em->getRepository(BaseInfo::class)->get();
        $template_path = $template->getFileName();

        $param = ['rec_order' =>  $rec_order, "base_info" => $base_info];

        $engine = $this->container->get('twig');
        $body = $engine->render($template_path, $param, null);
        $htmlFileName = $this->getHtmlTemplate($template_path);

        $message = $this->initialMsgCustom($rec_order, $template, 'with_admin', 'info@free-max.com');

        $message->setBody($body);
        if($htmlFileName){
            $htmlBody = $this->twig->render($htmlFileName, $param);
            $message
                ->setContentType('text/plain; charset=UTF-8')
                ->setBody($body, 'text/plain')
                ->addPart($htmlBody, 'text/html');
        }
        $count = $this->mailer->send($message);
        log_info('????????????Failed?????????????????????', ['count' => $count]);
    }
    public function initialMsg($rec_order, $template){
        $message = (new \Swift_Message())
            ->setSubject('['.$this->BaseInfo->getShopName().'] '.$template->getMailSubject())
            ->setFrom([$this->BaseInfo->getEmail01() => $this->BaseInfo->getShopName()])
            ->setTo([$rec_order->getOrder()->getEmail()])
            //->setBcc($this->BaseInfo->getEmail01())
            ->setReplyTo($this->BaseInfo->getEmail03())
            ->setReturnPath($this->BaseInfo->getEmail04());
        return $message;
    }
    public function isHtml($template_path){
        $fileName = explode('.', $templateName);
        return in_array("html", $fileName);
    }

    /**
     * @param EventArgs $event
     */
    public function onSendOrderMailBefore(EventArgs $event){
        log_info(RecurringHookController::LOG_IF . "onSendOrderMailBefore");

        $order = $event->getArgument('Order');
        // if(!$order->isRecurring()){
        //     return;
        // }
        $stripe_rec_order = $this->rec_order_repo->findOneBy(['Order' => $order]);

        if(empty($stripe_rec_order)){
            log_info(RecurringHookController::LOG_IF . "stripe_rec_order is empty");
            return;
        }


        $pb_service = $this->container->get('plg_stripe_rec.service.pointbundle_service');
        $bundles = $pb_service->getBundleProducts($stripe_rec_order);

        $price_sum = $pb_service->getPriceSum($stripe_rec_order);
        extract($price_sum);

        if($bundles){
            $bundle_order_items = $bundles['order_items'];
            $initial_amount += $bundles['price'];
        }else{
            $bundle_order_items = null;
        }


        // $em = $this->container->get('doctrine.orm.entity_manager');
        $base_info = $this->em->getRepository(BaseInfo::class)->get();

        $status = $stripe_rec_order->getPaidStatus();
        $rec_status = $stripe_rec_order->getRecStatus();

        $template = $this->em->getRepository(MailTemplate::class)->findOneBy([
            'name'  =>  ConfigService::REC_ORDER_THANKS
        ]);
        if(empty($template) || ($template && empty($template->getFileName()))){
            return;
        }
        log_info(RecurringHookController::LOG_IF . "change template");

        $template_path = $template->getFileName();


        if($coupon_str = $stripe_rec_order->getCouponDiscountStr()){
            $coupon_service = $this->container->get('plg_stripe_rec.service.coupon_service');
            $initial_discount = $coupon_service->couponDiscountFromStr($initial_amount, $coupon_str);
            $recurring_discount = $coupon_service->couponDiscountFromStr($recurring_amount, $coupon_str);
        }else{
            $initial_discount = 0;
            $recurring_discount = 0;
        }
        $param = [
            'Order' => $order,
            'rec_order'=> $stripe_rec_order,
            'bundle_order_items' => $bundle_order_items,
            'initial_amount' => $initial_amount,
            'recurring_amount' => $recurring_amount,
            'initial_discount' => $initial_discount,
            'recurring_discount'=> $recurring_discount,
        ];

        $engine = $this->container->get('twig');
        $vtMessage = $engine->render($template_path, $param, null);

        // $orderMassage = str_replace(["\r\n", "\r", "\n"], "<br/>", $vtMessage);
        $orderMassage = $vtMessage;

        $message = $event->getArgument('message');
        // ????????????????????????HTML?????????????????????????????????????????????
        // $Order->setMessage(htmlspecialchars_decode($orderMassage));
        // $order->setMessage($orderMassage);
        $htmlFileName = $this->getHtmlTemplate($template->getFileName());

        $beforeBody = $message->getChildren();
        $message->detach($beforeBody[0]);
        // HTML?????????????????????????????????????????????
        if (!is_null($htmlFileName)) {
            // ????????????????????????????????????????????????????????????????????????br??????????????????????????????
            $htmlBody = $engine->render($htmlFileName, $param);

            // HTML?????????????????????body????????????

            $message->addPart(htmlspecialchars_decode($htmlBody), 'text/html');

        }

        $message->setSubject('['.$base_info->getShopName().'] '.$template->getMailSubject());
        $message->setBody($orderMassage);
        log_info($orderMassage);
        log_info(RecurringHookController::LOG_IF . "send");
    }

    public function initialMsgCustom($rec_order, $template, $receive_type, $admin_email){
        if($receive_type == 'admin_only'){
            $receive_emails = [$admin_email];
        }elseif ($receive_type == 'with_admin'){
            $receive_emails = [$rec_order->getOrder()->getEmail(), $admin_email];
        }else{
            $receive_emails = [$rec_order->getOrder()->getEmail()];
        }
        $message = (new \Swift_Message())
            ->setSubject('['.$this->BaseInfo->getShopName().'] '.$template->getMailSubject())
            ->setFrom([$this->BaseInfo->getEmail01() => $this->BaseInfo->getShopName()])
            ->setTo($receive_emails)
            //->setBcc($this->BaseInfo->getEmail01())
            ->setReplyTo($this->BaseInfo->getEmail03())
            ->setReturnPath($this->BaseInfo->getEmail04());
        return $message;
    }
    
    public function sendPaymentMethodAttached($Customer)
    {
        $template = $this->em->getRepository(MailTemplate::class)->findOneBy([
            'name'  =>  ConfigService::PAYMENTMETHOD_ATTACHED
        ]);
        $base_info = $this->em->getRepository(BaseInfo::class)->get();
        $template_path = $template->getFileName();

        $param = ['Customer' =>  $Customer];

        $engine = $this->container->get('twig');
        $body = $engine->render($template_path, $param, null);
        $htmlFileName = $this->getHtmlTemplate($template_path);

        $message = (new \Swift_Message())
            ->setSubject('['.$base_info->getShopName().'] '.$template->getMailSubject())
            ->setFrom([$base_info->getEmail01() => $base_info->getShopName()])
            ->setTo([$Customer->getEmail(), 'info@free-max.com'])
            //->setBcc($this->BaseInfo->getEmail01())
            ->setReplyTo($base_info->getEmail03())
            ->setReturnPath($base_info->getEmail04());

        $message->setBody($body);
        if($htmlFileName){
            $htmlBody = $this->twig->render($htmlFileName, $param);
            $message
                ->setContentType('text/plain; charset=UTF-8')
                ->setBody($body, 'text/plain')
                ->addPart($htmlBody, 'text/html');
        }
        $count = $this->mailer->send($message);
        log_info('????????????Failed?????????????????????', ['count' => $count]);
    }
}
