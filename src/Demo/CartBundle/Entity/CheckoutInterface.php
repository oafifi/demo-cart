<?php

namespace Demo\CartBundle\Entity;

/**
 * Interface CheckoutInterface
 * @package Demo\CartBundle\Entity
 *
 * Defines an entity that can do checkout and create order from its data
 *
 * On a real project this interface can also define methods for payment and completing the purchase
 */
interface CheckoutInterface
{
    /**
     * Creates and complete the checkout of the cart, stores the order, and return it on success
     *
     * @return mixed
     */
    public function checkout();

    /**
     * Returns the total value of the elements in this cart
     *
     * @return mixed
     */
    public function getTotalCost();
}