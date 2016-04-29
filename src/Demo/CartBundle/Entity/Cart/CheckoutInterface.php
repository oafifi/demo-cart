<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/30/2016
 * Time: 1:33 AM
 */

namespace Demo\CartBundle\Entity\Cart;


interface CheckoutInterface
{
    /**
     * Returns the subtotal value of the implementor
     * subtotal value: value of elements without shipping fees, taxes .. etc
     *
     * @return mixed
     */
    public function getSubtotal();

    /**
     * Returns an order from the elements of the implementor
     *
     * @return mixed
     */
    public function checkout();
}