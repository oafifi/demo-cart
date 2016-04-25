<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/24/2016
 * Time: 10:44 PM
 */

namespace Demo\CartBundle\Entity;

/**
 * Interface CartManagerInterface
 * @package Demo\CartBundle\Entity
 *
 * Interface for order cart management
 * Provides data access layer
 */
interface CartManagerInterface
{
    /**
     * Create new cart
     *
     * Sticking to the convention that every user has one shopping cart,
     * the cart should be created and assigned to user upon user creation.
     *
     * @return mixed
     */
    public function create();

    /**
     * Delete cart by id
     *
     * @param $cart
     * @return mixed
     */
    public function delete($cart);

    /**
     * Update the cart
     *
     * @param $cart
     * @return mixed
     */
    public function update($cart);

    /**
     * find cart by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Add shopping item to the cart
     *
     * @param $item
     * @param $quantity
     * @return mixed
     */
    public function addShoppingItem($item, $quantity);

    /**
     * Add order item to the cart
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