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

use Eccube\Entity\ItemInterface;
use Eccube\Entity\OrderItem;
use Eccube\Service\PurchaseFlow\ItemValidator;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Common\EccubeConfig;

/**
 * 販売価格の変更検知.
 */
class PriceChangeValidator extends ItemValidator
{
    protected $eccubeConfig;
    /**
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(EccubeConfig $eccubeConfig)
    {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * @param ItemInterface $item
     * @param PurchaseContext $context
     *
     * @throws \Eccube\Service\PurchaseFlow\InvalidItemException
     */
    public function validate(ItemInterface $item, PurchaseContext $context)
    {
        if (!$item->isProduct()) {
            return;
        }
        $realPrice = $this->eccubeConfig['free_max_init_amount'];
        $ProductClass = $item->getProductClass();
        if ($item->getShip()==1){
            $realPrice += $this->eccubeConfig['free_max_monthly_amount'];
            if ($ProductClass->getClassCategory1()->getId()==7){
                $realPrice += $this->eccubeConfig['free_max_secret_free'];
            }elseif($ProductClass->getClassCategory1()->getId()==8){
                $realPrice += $this->eccubeConfig['free_max_secret_brand'];
            }
        }

        if ($ProductClass->getClassCategory2()->getId()==10) $realPrice += $this->eccubeConfig['free_max_ac_use'];

        if ($item instanceof OrderItem) {
            $price = $item->getPrice();
            $realPrice = $realPrice;
        } else {
            // CartItem::priceは税込金額.
            $price = $item->getPrice();
            $realPrice = intVal($realPrice * 1.1);
        }

        if ($price != $realPrice) {
            $item->setPrice($realPrice);
            $this->throwInvalidItemException('front.shopping.price_changed', $item->getProductClass());
        }
    }
}
