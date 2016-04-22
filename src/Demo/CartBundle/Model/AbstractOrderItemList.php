<?php


namespace Demo\CartBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractOrderItemList
 * @package Demo\CartBundle\Model
 *
 * Base class for order items container
 */
abstract class AbstractOrderItemList
{
    protected $id;

    protected $name;

    protected $itemList;

    public function __construct()
    {
        $this->itemList = new ArrayCollection();
    }
}