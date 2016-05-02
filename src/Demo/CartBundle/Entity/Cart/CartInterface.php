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

/**
 * Interface CartInterface
 * @package Demo\CartBundle\Entity\Cart
 *
 * Interface for defining a Cart
 *
 * This provides an abstraction layer for the different types of cart.
 * Although different types of carts have the same behavior and interface, which is storing shopping items for some use,
 * they differ in their role and the implementation that serve this role to the extent that makes it better to separate
 * them to different hierarchies (sub types), each has it's own abstract layer that defines this implementation.
 * For example:
 *
 * The order cart: holds shopping items that the user is going to buy, and info about the quantity to be bought, every
 * user has one order cart only, it has the checkout capability to create the order of those items.
 *
 * The wish lists: holds shopping items that the user wish to buy, and info about the quantity he wish, comments, and
 * urgency of these items, every user can create many lists, it doesn't have checkout capability though you can programmaticaly
 * create lists with checkout capability easily.
 *
 * The above types differ in how they hold the shopping items and add it to its list.
 */
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