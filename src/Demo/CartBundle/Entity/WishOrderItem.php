<?php

namespace Demo\CartBundle\Entity;

/**
 * Class WishOrderItem
 * @package Demo\CartBundle\Entity
 *
 * Wish list order item.
 */
class WishOrderItem extends OrderItem
{
    protected $comment;

    protected $priority;
}