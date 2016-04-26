<?php

namespace Demo\CartBundle\Entity\Cart;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class WishList
 * @package Demo\CartBundle\Entity
 *
 * Wish list that holds wish order items.
 * Provides data access methods.
 *
 * @ORM\Entity
 */
class WishList implements WishListInterface
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
     * @ORM\OneToMany(targetEntity="WishOrderItem", mappedBy="wishList")
     */
    protected $items;

    /**
     * name of the cart
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $public;


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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set publicList
     *
     * @param boolean $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }

    /**
     * Get publicList
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
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
    public function addItem(AbstractShoppingItem $item)
    {
        $wishItem = new WishOrderItem();
        $wishItem->setItem($item);

        $this->addWishOrderItem($wishItem);
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
     * @param WishOrderItemInterface $item
     */
    public function addWishOrderItem(WishOrderItemInterface $item)
    {
        $this->items[] = $item;
    }

    /**
     * Remove item from the list
     *
     * @param WishOrderItemInterface $item
     */
    public function removeWishOrderItem(WishOrderItemInterface $item)
    {
        $this->items->removeElement($item);
    }
}
