<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/24/2016
 * Time: 10:44 PM
 */

namespace Demo\CartBundle\Entity\Cart;
use Demo\CartBundle\Entity\OrderElement\OrderItemInterface;
use Demo\CartBundle\Entity\OrderElement\WishOrderItemInterface;
use Demo\CartBundle\Entity\Product\ShoppingItemInterface;

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
     * Return the current user cart
     *
     * @return AbstractOrderCart
     */
    public function getUserCart();

    /**
     * Create new cart
     *
     * Sticking to the convention that every user has one shopping cart,
     * the cart should be created and assigned to user upon user creation.
     *
     * @return AbstractOrderCart
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
     * @param AbstractOrderCart $cart
     * @return AbstractOrderCart
     */
    public function update(AbstractOrderCart $cart);

    /**
     * find cart by id
     *
     * @param $id
     * @return AbstractOrderCart
     */
    public function findById($id);

    /**
     * Add shopping item to the cart
     *
     * @param ShoppingItemInterface $item
     * @return OrderItemInterface
     */
    public function addShoppingItem(ShoppingItemInterface $item);

    /**
     * Add wish list item to the cart
     *
     * @param WishOrderItemInterface $item
     * @return mixed
     */
    public function addWishOrderItem(WishOrderItemInterface $item);

    /**
     * remove item from the cart
     *
     * @param OrderItemInterface $item
     * @return mixed
     */
    public function removeItem(OrderItemInterface $item);

    /**
     * Empty the cart, remove all elements
     *
     * @return AbstractOrderCart
     */
    public function emptyCart();
}