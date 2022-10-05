<?php

declare(strict_types=1);

namespace Customize\Service\Cart;

use Eccube\Entity\CartItem;
use Eccube\Service\Cart\CartItemComparator;

class ProductClassAndShipComparator implements CartItemComparator
{
    public function compare(CartItem $item1, CartItem $item2): bool
    {
        $classA = $item1->getProductClass();
        $classB = $item2->getProductClass();

        $a = $classA === null ? null : (string)$classA->getId();
        $b = $classB === null ? null : (string)$classB->getId();

        if ($a !== $b) {
            return false;
        }

        $shipA = $item1->getShip();
        $shipB = $item2->getShip();

        return $shipA === $shipB;
    }
}