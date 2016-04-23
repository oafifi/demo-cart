<?php

namespace Demo\CartBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractOrder
 * @package Demo\CartBundle\Entity
 *
 * Base class for orders
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractOrder
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $orderTime;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $value;

    /**
     * @ORM\Column(type="text")
     */
    protected $address;

    /**
     * @ORM\ManyToMany(targetEntity="OrderItem")
     * @ORM\JoinTable(name="order_items",
     *      joinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $itemList;

    public function __construct()
    {
        $this->itemList = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrderTime()
    {
        return $this->orderTime;
    }

    /**
     * @param mixed $orderTime
     */
    public function setOrderTime($orderTime)
    {
        $this->orderTime = $orderTime;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getItemList()
    {
        return $this->itemList;
    }

    /**
     * @param mixed $itemList
     */
    public function setItemList($itemList)
    {
        $this->itemList = $itemList;
    }


}
