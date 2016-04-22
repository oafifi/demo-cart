<?php

namespace Demo\CartBundle\Model;

/**
 * Class AbstractOrderItem
 * @package Demo\CartBundle\Model
 *
 * Base class for order items (items to be ordered)
 */
abstract class AbstractOrderItem
{
    protected $id;

    protected $item;

    protected $quantity;
}