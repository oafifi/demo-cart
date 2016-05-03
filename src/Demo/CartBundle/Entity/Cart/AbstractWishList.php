<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/26/2016
 * Time: 4:51 PM
 */

namespace Demo\CartBundle\Entity\Cart;


use Demo\CartBundle\Entity\OrderElement\AbstractOrderItem;
use Demo\CartBundle\Entity\OrderElement\WishOrderItem;
use Demo\CartBundle\Entity\Product\AbstractShoppingItem;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Proxies\__CG__\Demo\CartBundle\Entity\Cart\WishList;

/**
 * Class AbstractWishList
 * @package Demo\CartBundle\Entity\Cart
 *
 * @ORM\MappedSuperclass
 *
 * The base for Wish List cart type, it defines main logic that a wish list must implement.
 * The wish lists: holds shopping items that the user wish to buy, and info about the quantity he wish, comments, and
 * urgency of these items, every user can create many lists, it doesn't have checkout capability though you can programmaticaly
 * create lists with checkout capability easily by extending this class and implementing checkout interface.
 *
 * The wish list stores its shopping items as a wish list order item type that can have a comment and urgency indicator,
 * and doesn't allow more than one order item of the same shopping item, you can increase the quantity of the item as
 * you wish but never replicate it.
 */
class AbstractWishList implements CartInterface
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
     * @ORM\OneToMany(targetEntity="Demo\CartBundle\Entity\OrderElement\WishOrderItem", mappedBy="list", orphanRemoval=true)
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
        $foundItem = $this->containsItem($item);

        if($foundItem){
            $oldQuantity = $foundItem->getQuantity();
            $foundItem->setQuantity($oldQuantity+1);

            return $foundItem;
        }

        $wishItem = new WishOrderItem();
        $wishItem->setItem($item);
        $wishItem->setQuantity(1);
        $wishItem->setList($this);

        $this->items[]= $wishItem;

        return $wishItem;
    }

    /**
     * @inheritDoc
     */
    public function removeItem(AbstractOrderItem $item)
    {
        return $this->items->removeElement($item);
    }

    /**
     * @inheritDoc
     */
    public function containsItem(AbstractShoppingItem $item)
    {
        $id = $item->getId();

        $closure = function(AbstractOrderItem $orderItem) use($id){
            return ($orderItem->getItem()->getId() == $id);
        };

        $result = $this->items->filter($closure);

        if($result->isEmpty()) {
            return null;
        }

        return $result->first();
    }
}