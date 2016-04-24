<?php


namespace Demo\CartBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractCart
 * @package Demo\CartBundle\Entity
 *
 * Base class for carts
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractCart
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * name of the cart
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * List to hold the cart items
     *
     * @ORM\ManyToMany(targetEntity="OrderItem")
     * @ORM\JoinTable(name="cart_items",
     *      joinColumns={@ORM\JoinColumn(name="cart_id", referencedColumnName="id")},
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get an array copy of the cart items to prevent direct manipulation of the original list
     *
     * @return array
     */
    public function getItemList()
    {
        return $this->itemList->getValues();
    }

    /**
     * Add item to the list
     *
     * @param \Demo\CartBundle\Entity\OrderItem $itemList
     * @return OrderCart
     */
    public function addItemList(\Demo\CartBundle\Entity\OrderItem $itemList)
    {
        $this->itemList[] = $itemList;

        return $this;
    }

    /**
     * Remove item from from the list
     *
     * @param \Demo\CartBundle\Entity\OrderItem $itemList
     */
    public function removeItemList(\Demo\CartBundle\Entity\OrderItem $itemList)
    {
        $this->itemList->removeElement($itemList);
    }

    /**
     * Remove all items in the cart
     */
    public function emptyCart()
    {
        $this->itemList->clear();
    }

    /**
     * get number of items in the cart
     *
     * @return int
     */
    public function getCount()
    {
        return $this->itemList->count();
    }

}
