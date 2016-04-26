<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/26/2016
 * Time: 4:03 PM
 */

namespace Demo\CartBundle\Entity;


interface WishOrderItemInterface extends OrderItemInterface
{
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

    /**
     * @return WishListInterface
     */
    public function getWishList();
}