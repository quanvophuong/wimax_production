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

/**
 * 販売価格の変更検知.
 */
class PriceChangeValidator extends ItemValidator
{
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

        if ($item instanceof OrderItem) {
            $price = $item->getPrice();
            $realPrice = $item->getProductClass()->getPrice02();
            if($item->getShip()==2){
                $realPrice = 3000;
                if ($item->getClassCategoryName2()=='購入する'); $realPrice+= 1400;
            }
        } else {
            // CartItem::priceは税込金額.
            $price = $item->getPrice();
            $realPrice = $item->getProductClass()->getPrice02IncTax();
            
            if($item->getShip()==2){
                $realPrice = 3300;
                if ($item->getProductClass()->getClassCategory2()->getId()==10); $realPrice+= 1540;
            }
        }

        if ($price != $realPrice) {
            $item->setPrice($realPrice);
            $this->throwInvalidItemException('front.shopping.price_changed', $item->getProductClass());
        }
    }
}
