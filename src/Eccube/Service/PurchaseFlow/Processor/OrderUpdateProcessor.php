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

namespace Eccube\Service\PurchaseFlow\Processor;

use Eccube\Entity\ItemHolderInterface;
use Eccube\Entity\Master\OrderStatus;
use Eccube\Entity\Order;
use Eccube\Repository\Master\OrderStatusRepository;
use Eccube\Service\PurchaseFlow\PurchaseContext;

/**
 * 受注情報更新処理.
 */
class OrderUpdateProcessor extends AbstractPurchaseProcessor
{
    /**
     * @var OrderStatusRepository
     */
    private $orderStatusRepository;

    /**
     * OrderUpdateProcessor constructor.
     *
     * @param OrderStatusRepository $orderStatusRepository
     */
    public function __construct(OrderStatusRepository $orderStatusRepository)
    {
        $this->orderStatusRepository = $orderStatusRepository;
    }

    public function commit(ItemHolderInterface $target, PurchaseContext $context)
    {
        if (!$target instanceof Order) {
            return;
        }
        $OrderItems = $target->getOrderItems();
        $order_status_id = OrderStatus::NEW;
        foreach($OrderItems as $OrderItem){
            if (!$OrderItem->isProduct()) continue;
            if ($OrderItem->getShip()==2){
                $order_status_id = OrderStatus::IN_PROGRESS;
                break;
            }
        }

        foreach($target->getShippings() as $Shipping){
            if ($Shipping->getDelivery()->getName() == '店頭受取'){
                $order_status_id = OrderStatus::PICKUP;
                break;
            }
        }

        $OrderStatus = $this->orderStatusRepository->find($order_status_id);
        $target->setOrderStatus($OrderStatus);
        $target->setOrderDate(new \DateTime());
    }
}
