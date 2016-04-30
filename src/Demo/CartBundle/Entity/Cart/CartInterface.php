<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/26/2016
 * Time: 4:27 PM
 */

namespace Demo\CartBundle\Entity\Cart;



use Demo\CartBundle\Entity\OrderElement\AbstractOrderItem;
use Demo\CartBundle\Entity\Product\AbstractShoppingItem;

interface CartInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * Get an array copy of the cart items to prevent direct manipulation of the original list
     *
     * @return AbstractOrderItem[]
     */
    public function getItems();

    /**
     * Add item to the cart
     *
     * @param AbstractShoppingItem $item
     * @return AbstractOrderItem
     */
    public function addItem(AbstractShoppingItem $item);

    /**
     * Remove item from from the cart
     *
     * @param AbstractOrderItem $item
     * @return bool
     */
    public function removeItem(AbstractOrderItem $item);

    /**
     * Check if the cart contains this shopping item
     *
     * @param AbstractShoppingItem $item
     * @return AbstractOrderItem
     */
    public function containsItem(AbstractShoppingItem $item);

    /**
     * Remove all items in the cart
     */
    public function clear();

    /**
     * get number of items in the cart
     *
     * @return int
     */
    public function count();
}