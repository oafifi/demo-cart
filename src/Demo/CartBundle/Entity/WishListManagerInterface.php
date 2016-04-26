<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 5:29 PM
 */

namespace Demo\CartBundle\Entity;


/**
 * Interface WishListManagerInterface
 * @package Demo\CartBundle\Entity
 *
 * Interface for wish list management
 * Provides data access layer
 */
interface WishListManagerInterface
{
    /**
     * Create new wishlist
     *
     * @return mixed
     */
    public function create();

    /**
     * Delete list by id
     *
     * @param $cart
     * @return mixed
     */
    public function delete($cart);

    /**
     * Update the list
     *
     * @param $cart
     * @return mixed
     */
    public function update($cart);

    /**
     * find list by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Add shopping item to the list
     *
     * @param $item
     * @param $quantity
     * @return mixed
     */
    public function addShoppingItem($item, $quantity);

    /**
     * Add order item to the list
     *
     * @param $item
     * @return mixed
     */
    public function addOrderItem($item);

    /**
     * Add wish list item to the cart
     *
     * @param $item
     * @return mixed
     */
    public function addWishOrderItem($item);

    /**
     * remove item from the cart
     *
     * @param $item
     * @return mixed
     */
    public function removeItem($item);

    /**
     * Empty the cart, remove all elements
     *
     * @return mixed
     */
    public function emptyCart();
}