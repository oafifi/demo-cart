<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/22/2016
 * Time: 6:39 PM
 */

namespace Demo\CartBundle\Model;

/**
 * Class OrderCart
 * @package Demo\CartBundle\Model
 *
 * Orders cart that holds order items, and create order from its contents (checkout).
 * Provides data access methods.
 */
class OrderCart extends AbstractOrderItemList implements EntityDataAccessInterface, CheckoutInterface
{
    public function checkout()
    {
        // TODO: Implement checkout() method.
    }
}