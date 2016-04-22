<?php

namespace Demo\CartBundle\Model;

/**
 * Class WishList
 * @package Demo\CartBundle\Model
 *
 * Wish list that holds order items.
 * Provides data access methods.
 */
class WishList extends AbstractCart implements EntityDataAccessInterface
{
    protected $description;

    protected $publicList;

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