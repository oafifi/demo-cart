<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/22/2016
 * Time: 6:45 PM
 */

namespace Demo\CartBundle\Model;

/**
 * Class WishList
 * @package Demo\CartBundle\Model
 *
 * Wish list that holds order items.
 * Provides data access methods.
 */
class WishList extends AbstractOrderItemList implements EntityDataAccessInterface
{
    protected $description;

    protected $publicList;
}