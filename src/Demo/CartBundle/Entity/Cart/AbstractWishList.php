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

/**
 * Class AbstractWishList
 * @package Demo\CartBundle\Entity\Cart
 *
 * @ORM\MappedSuperclass
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
     * @ORM\OneToMany(targetEntity="Demo\CartBundle\Entity\OrderElement\ListOrderItem", mappedBy="list")
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

        $this->items[]= $wishItem;
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