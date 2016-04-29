<?php

namespace Demo\CartBundle\Entity\Cart;

/**
 * Interface OrderCartInterface
 * @package Demo\CartBundle\Entity
 *
 * Defines a cart that can do checkout and create order from its order items
 *
 */
interface OrderCartInterface extends CartInterface, CheckoutInterface
{

}