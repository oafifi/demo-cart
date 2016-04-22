<?php

namespace Demo\CartBundle\Entity;

/**
 * Class AbstractOrderItem
 * @package Demo\CartBundle\Entity
 *
 * Base class for order items (items to be ordered)
 */
abstract class AbstractOrderItem
{
    protected $id;

    protected $item;

    protected $quantity;
}