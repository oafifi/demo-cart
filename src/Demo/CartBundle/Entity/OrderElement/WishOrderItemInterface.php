<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/26/2016
 * Time: 4:03 PM
 */

namespace Demo\CartBundle\Entity\OrderElement;


use Demo\CartBundle\Entity\Cart\AbstractWishList;

interface WishOrderItemInterface extends ListItemInterface
{

    /**
     * Add sub orders bought from this wish item
     *
     * @param ListOrderItem $subItem
     * @return mixed
     */
    public function addSubItem(ListOrderItem $subItem);

    /**
     * returns a list of sub orders of this order
     *
     * @return ListOrderItem[]
     */
    public function getSubItems();

    /**
     * returns the remaining wanted quantity of this item
     *
     * @return int
     */
    public function remainingCount();

    /**
     * checks if this wish item is fulfilled (bought)
     *
     * @return bool
     */
    public function isFulfilled();

    /**
     * Set comment
     *
     * @param string $comment
     */
    public function setComment($comment);

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment();

    /**
     * Set important
     *
     * @param boolean $important
     */
    public function setImportant($important);

    /**
     * Get important
     *
     * @return boolean
     */
    public function getImportant();
}