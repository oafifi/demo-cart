<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/26/2016
 * Time: 4:27 PM
 */

namespace Demo\CartBundle\Entity\Cart;



use Demo\CartBundle\Entity\OrderElement\OrderItemInterface;
use Demo\CartBundle\Entity\Product\ShoppingItemInterface;

interface CartInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * Get an array copy of the cart items to prevent direct manipulation of the original list
     *
     * @return OrderItemInterface[]
     */
    public function getItems();

    /**
     * Add item to the cart
     *
     * @param ShoppingItemInterface $item
     * @return OrderItemInterface
     */
    public function addItem(ShoppingItemInterface $item);

    /**
     * Remove item from from the cart
     *
     * @param OrderItemInterface $item
     * @return bool
     */
    public function removeItem(OrderItemInterface $item);

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