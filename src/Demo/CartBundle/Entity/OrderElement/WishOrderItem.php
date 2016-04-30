<?php

namespace Demo\CartBundle\Entity\OrderElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class WishOrderItem
 * @package Demo\CartBundle\Entity
 *
 * Wish list order item.
 *
 * @ORM\Entity
 */
class WishOrderItem extends ListOrderItem implements WishOrderItemInterface
{
    /**
     * @ORM\Column(type="text")
     */
    protected $comment;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $important;

    /**
     * List to hold the sub items (sub orders fulfilled from the desired quantity)
     * this is important to know that someone already bought this for you and who is he
     *
     *@ORM\ManyToMany(targetEntity="Demo\CartBundle\Entity\OrderElement\ListOrderItem")
     * @ORM\JoinTable(name="wish_sub_items",
     *      joinColumns={@ORM\JoinColumn(name="wish_item_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sub_item_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $subItems;



    /**
     * Set comment
     *
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set important
     *
     * @param boolean $important
     */
    public function setImportant($important)
    {
        $this->important = $important;
    }

    /**
     * Get important
     *
     * @return boolean 
     */
    public function getImportant()
    {
        return $this->important;
    }

    /**
     * @inheritDoc
     */
    public function addSubItem(ListOrderItem $subItem)
    {
        // TODO: Implement addSubItem() method.
    }

    /**
     * @inheritDoc
     */
    public function getSubItems()
    {
        // TODO: Implement getSubItems() method.
    }

    /**
     * @inheritDoc
     */
    public function remainingCount()
    {
        // TODO: Implement remainingCount() method.
    }

    /**
     * @inheritDoc
     */
    public function isFulfilled()
    {
        // TODO: Implement isFulfilled() method.
    }



}
