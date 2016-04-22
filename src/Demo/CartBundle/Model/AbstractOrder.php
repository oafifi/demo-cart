<?php

namespace Demo\CartBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractOrder
 * @package Demo\CartBundle\Model
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