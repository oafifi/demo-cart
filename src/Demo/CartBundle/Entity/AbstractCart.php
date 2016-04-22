<?php


namespace Demo\CartBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractCart
 * @package Demo\CartBundle\Entity
 *
 * Base class for order items container
 */
abstract class AbstractCart
{
    protected $id;

    protected $name;

    protected $itemList;

    public function __construct()
    {
        $this->itemList = new ArrayCollection();
    }
}