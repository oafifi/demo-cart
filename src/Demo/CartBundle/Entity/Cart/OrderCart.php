<?php

namespace Demo\CartBundle\Entity\Cart;

use Demo\CartBundle\Entity\OrderElement\OrderItem;
use Demo\CartBundle\Entity\OrderElement\OrderItemInterface;
use Demo\CartBundle\Entity\Product\ShoppingItemInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderCart
 * @package Demo\CartBundle\Entity
 *
 * Orders cart that holds order items, and create order from its contents (checkout).
 * Provides data access methods.
 *
 * @ORM\Entity
 */
class OrderCart implements OrderCartInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * List to hold the cart items
     *
     *@ORM\ManyToMany(targetEntity="Demo\CartBundle\Entity\OrderElement\OrderItem")
     * @ORM\JoinTable(name="cart_items",
     *      joinColumns={@ORM\JoinColumn(name="cart_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $items;


    //Constructor


    public function __construct()
    {
        $this->items = new ArrayCollection();
    }


    //Methods

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getItems()
    {
        return $this->items->getValues();
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        $this->items->count();
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        $this->items->clear();
    }

    /**
     * @inheritDoc
     */
    public function addItem(ShoppingItemInterface $item)
    {
        $wishItem = new OrderItem();
        $wishItem->setItem($item);

        $this->addOrderItem($wishItem);
    }

    /**
     * @inheritDoc
     */
    public function removeItem(OrderItemInterface $item)
    {
        return $this->items->removeElement($item);
    }

    /**
     * Add item to the list
     *
     * @param OrderItemInterface $item
     */
    public function addOrderItem(OrderItemInterface $item)
    {
        $this->items[] = $item;
    }

    /**
     * 
     * @inheritDoc
     */
    public function getSubtotal()
    {
        $subtotal = 0;
        foreach($this->items as $orderItem){
            $subtotal += $orderItem->getTotal();
        }

        return $subtotal;
    }

}
