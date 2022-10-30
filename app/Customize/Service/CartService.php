<?php

declare(strict_types=1);

namespace Customize\Service;

use Eccube\Entity\CartItem;
use Eccube\Entity\ProductClass;

class CartService extends \Eccube\Service\CartService
{

    /**
     * @var array
     */
    protected $eccubeConfig;

    /**
     * @param array{string, string} $options
     */
    public function addCartItem(ProductClass $productClass, int $quantity = 1, array $options = []): bool
    {
        $classCategory1 = $productClass->getClassCategory1();
        if ($classCategory1 && ! $classCategory1->isVisible()) {
            return false;
        }

        $classCategory2 = $productClass->getClassCategory2();
        if ($classCategory2 && ! $classCategory2->isVisible()) {
            return false;
        }
        
        $cartItem = new CartItem();
        $cartItem->setProductClass($productClass)
                 ->setPrice($productClass->getPrice02IncTax())
                 ->setQuantity($quantity);

        if (isset($options['ship'])) {
            $cartItem->setShip($options['ship']);
            log_info(
                        'CartItem',
                        [                                      
                           'ship' => $options['ship'],
                        ]
                    );
            
            $price = $this->eccubeConfig['free_max_init_amount'];
            if ($cartItem->getShip()==1){
                $price += $this->eccubeConfig['free_max_monthly_amount'];
                if ($classCategory1->getId()==7){
                    $price += $this->eccubeConfig['free_max_secret_free'];
                }elseif($classCategory1->getId()==8){
                    $price += $this->eccubeConfig['free_max_secret_brand'];
                }
            }
            
            if ($classCategory2->getId()==10) $price += $this->eccubeConfig['free_max_ac_use'];
            
            $cartItem->setPrice(intVal($price*1.1));
        }

        $cartItems = $this->mergeAllCartItems([$cartItem]);
        $this->restoreCarts($cartItems);

        return true;
    }

    public function changeCartItemQuantity(int $cartItemId, int $quantity): bool
    {
        $itemFound = false;

        $carts = $this->getCarts();
        foreach ($carts as $cart) {
            foreach ($cart->getCartItems() as $cartItem) {
                if ($cartItem->getId() !== $cartItemId) {
                    continue;
                }

                $cartItem->setQuantity($quantity);
                $itemFound = true;

                break;
            }

            if ($itemFound) {
                break;
            }
        }

        if ($itemFound === false) {
            return false;
        }

        $cartItems = $this->mergeAllCartItems();
        $this->restoreCarts($cartItems);

        return true;
    }
}