<?php

namespace Demo\CartBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractOrder
 * @package Demo\CartBundle\Entity
 *
 * Base class for orders
 */
abstract class AbstractOrder
{
    protected $id;

    protected $orderTime;

    protected $address;

    protected $orderItemList;

    public function __construct()
    {
        $this->orderItemList = new ArrayCollection();
    }
}