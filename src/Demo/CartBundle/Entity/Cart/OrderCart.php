<?php

namespace Demo\CartBundle\Entity\Cart;

use Demo\CartBundle\Entity\OrderElement\OrderItem;
use Demo\CartBundle\Entity\OrderElement\OrderItemInterface;
use Demo\CartBundle\Entity\OrderElement\WishOrderItemInterface;
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
     *@ORM\ManyToMany(targetEntity="Demo\CartBundle\Entity\OrderElement\OrderItem", orphanRemoval=true)
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
        $foundItem = $this->containsItem($item);

        if($foundItem){
            $oldQuantity = $foundItem->getQuantity();
            $foundItem->setQuantity($oldQuantity+1);

            return $foundItem;
        }
        $orderItem = new OrderItem();
        $orderItem->setItem($item);
        $orderItem->setQuantity(1);

        $this->items[] = $orderItem;

        return $orderItem;
    }

    /**
     * @inheritDoc
     */
    public function removeItem(OrderItemInterface $item)
    {
        return $this->items->removeElement($item);
    }

    /**
     * @inheritDoc
     *
     * The order cart can hold a max of one order item of a certain product, but many of wish-list order items
     * of the same shopping item if they are from different wish-lists.
     * This method checks if this shopping item is added as order item or not, if found, it will return the order item
     * to edit it or whatever it is needed in.
     *
     */
    public function containsItem(ShoppingItemInterface $item)
    {
        $id = $item->getId();

        $closure = function($orderItem) use($id){
            return (($orderItem->getItem()->getId() == $id) and (!($orderItem instanceof WishOrderItemInterface)));
        };

        $result = $this->items->filter($closure);

        if($result->isEmpty()) {
            return null;
        }

        return $result->first();
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
