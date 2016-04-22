<?php


namespace Demo\CartBundle\Entity;

/**
 * Class AbstractShoppingItem
 * @package Demo\CartBundle\Entity
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