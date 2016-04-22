<?php

namespace Demo\CartBundle\Entity;

/**
 * Class OrderCart
 * @package Demo\CartBundle\Entity
 *
 * Orders cart that holds order items, and create order from its contents (checkout).
 * Provides data access methods.
 */
class OrderCart extends AbstractCart implements EntityDataAccessInterface, CheckoutInterface
{
    public function checkout()
    {
        // TODO: Implement checkout() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public static function find($id)
    {
        // TODO: Implement find() method.
    }

    public static function findAll()
    {
        // TODO: Implement findAll() method.
    }


}