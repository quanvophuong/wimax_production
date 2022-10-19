<?php
namespace Customize\EventListener;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Eccube\Request\Context;


use Eccube\Service\MailService;
use Eccube\Entity\Master\OrderStatus;



class AdminOrderEditListener implements EventSubscriberInterface
{

    /**
     * @var MailService
     */
    protected $mailService;

    /**
    * CartAddCompleteListener constructor.
    *
    */
    public function __construct(
        EntityManagerInterface $entityManager,
        MailService $mailService
    ) {
        $this->entityManager = $entityManager;
        $this->mailService = $mailService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            EccubeEvents::ADMIN_ORDER_EDIT_INDEX_COMPLETE => 'onAdminOrderEditComplete',
        ];
    }

    public function onAdminOrderEditComplete(EventArgs $eventArgs)
    {
        $TargetOrder = $eventArgs->getArgument('TargetOrder');
        $OriginOrder = $eventArgs->getArgument('OriginOrder');
        $Customer = $eventArgs->getArgument('Customer');

        if ($TargetOrder->getOrderStatus() != $OriginOrder->getOrderStatus() && $TargetOrder->getOrderStatus()->getId() == OrderStatus::DELIVERED){

            $Shipping = $TargetOrder->getShippings()[0];
            $this->mailService->sendShippingNotifyMail($Shipping);
            $Shipping->setMailSendDate(new \DateTime());

            $this->entityManager->persist($Shipping);
            $this->entityManager->flush($Shipping);
        }
    }
}
?>
