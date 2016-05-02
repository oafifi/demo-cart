<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/30/2016
 * Time: 11:56 PM
 */

namespace Demo\CartBundle\Entity\Cart;


use Demo\CartBundle\Entity\OrderElement\AbstractOrderItem;
use Demo\CartBundle\Entity\OrderElement\DetailedWishItemInterface;
use Demo\CartBundle\Entity\Product\AbstractShoppingItem;

/**
 * Interface ListManagerInterface
 * @package Demo\CartBundle\Entity\Cart
 *
 * Interface for wish list type management
 * Provides data access layer
 * Acts as an abstraction layer between controller and data model, hides details and type of persistance.
 *
 * Every entity type has its own manager to provide easier maintainance and separation of concerns, this also leads
 * to ease in adopting and implementing scailability solutions. (If we decided to migrate to another database
 * for this specific entity for example).
 */
interface ListManagerInterface
{

    /**
     * Create new list
     *
     * @param AbstractWishList $list
     * @return int
     */
    public function create(AbstractWishList $list);

    /**
     * Delete cart by id
     *
     * @param $listId
     * @return mixed
     */
    public function delete($listId);

    /**
     * Update the list
     *
     * @param AbstractWishList $list
     * @return AbstractWishList
     */
    public function update(AbstractWishList $list);

    /**
     * find list by id
     *
     * @param $id
     * @return AbstractWishList
     */
    public function findById($id);

    /**
     * return list of user lists
     * @return mixed
     */
    public function getUserLists();

    /**
     * Add shopping item to the cart
     *
     * @param AbstractShoppingItem $item
     * @param AbstractWishList $list
     * @return AbstractOrderItem
     */
    public function addShoppingItem(AbstractShoppingItem $item, AbstractWishList $list);

    /**
     * Add wish list item to the list
     *
     * @param DetailedWishItemInterface $item
     * @return mixed
     */
    public function addWishOrderItem(DetailedWishItemInterface $item);

    /**
     * remove item from the list
     *
     * @param AbstractOrderItem $item
     * @param $listId
     * @return mixed
     */
    public function removeItem(AbstractOrderItem $item, $listId);

    /**
     * Empty the list, remove all elements
     *
     * @param $listId
     * @return AbstractOrderCart
     */
    public function emptyCart($listId);
}