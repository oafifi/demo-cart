<?php

namespace Demo\CartBundle\Entity;

/**
 * Interface OrderCartInterface
 * @package Demo\CartBundle\Entity
 *
 * Defines an entity that can do checkout and create order from its data
 *
 * On a real project this interface can also define methods for payment and completing the purchase
 */
interface OrderCartInterface
{
    /**
     * Returns the subtotal value of the cart in this cart
     * subtotal value: value of elements in the cart without shipping fees, taxes .. etc
     *
     * @return mixed
     */
    public function getSubtotal();
}