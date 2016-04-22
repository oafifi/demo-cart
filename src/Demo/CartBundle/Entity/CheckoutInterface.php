<?php

namespace Demo\CartBundle\Entity;

/**
 * Interface CheckoutInterface
 * @package Demo\CartBundle\Entity
 *
 * Defines an entity that can do checkout and create order from its data
 */
interface CheckoutInterface
{
    public function checkout();
}