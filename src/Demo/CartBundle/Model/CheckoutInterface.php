<?php

namespace Demo\CartBundle\Model;

/**
 * Interface CheckoutInterface
 * @package Demo\CartBundle\Model
 *
 * Defines an entity that can do checkout and create order from its data
 */
interface CheckoutInterface
{
    public function checkout();
}