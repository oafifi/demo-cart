<?php


namespace Demo\CartBundle\Model;

/**
 * Class AbstractShoppingItem
 * @package Demo\CartBundle\Model
 *
 * Base class for Shopping items
 */
abstract class AbstractShoppingItem
{
    protected $id;

    protected $name;

    protected $description;

    protected $price;

    protected $inStock;
}