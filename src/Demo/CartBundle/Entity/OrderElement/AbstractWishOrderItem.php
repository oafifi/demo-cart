<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 5/2/2016
 * Time: 7:23 AM
 */

namespace Demo\CartBundle\Entity\OrderElement;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractWishOrderItem
 * @package Demo\CartBundle\Entity\OrderElement
 *
 * @ORM\MappedSuperclass
 *
 * Base class for wish order items, defines adding sub items logic, sub items for wish order item are list order items
 * that are part of this wish list order, fulfills certain quantity of the required quantity and shows who made this order
 * [in case of integrating users logic]
 */
class AbstractWishOrderItem extends ListOrderItem
{
    /**
     * List to hold the sub items (sub orders fulfilled from the desired quantity)
     * this is important to know that someone already bought this for you and who is he
     *
     *@ORM\ManyToMany(targetEntity="Demo\CartBundle\Entity\OrderElement\ListOrderItem", orphanRemoval=true)
     * @ORM\JoinTable(name="wish_sub_items",
     *      joinColumns={@ORM\JoinColumn(name="wish_item_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sub_item_id", referencedColumnName="id", unique=true, onDelete="CASCADE")}
     *      )
     */
    protected $subItems;

    public function __construct()
    {
        $this->subItems = new ArrayCollection();
    }

    /**
     * @inheritDoc
     */
    public function addSubItem(ListOrderItem $subItem)
    {
        if($this->isFulfilled())
        {
            return null;
        }

        $this->subItems[] = $subItem;

        return $subItem;
    }

    /**
     * @inheritDoc
     */
    public function getSubItems()
    {
        $this->subItems->getValues();
    }

    /**
     * @inheritDoc
     */
    public function remainingCount()
    {
        $count = 0;
        foreach($this->subItems as $subItem)
        {
            $count += $subItem->getQuantity();
        }

        return $this->getQuantity() - $count;
    }

    /**
     * @inheritDoc
     */
    public function isFulfilled()
    {
        if($this->remainingCount() <= 0)
        {
            return true;
        }

        return false;
    }
}