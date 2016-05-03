<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 12:48 PM
 */

namespace Demo\CartBundle\Entity\Product;


/**
 * Interface ShoppingItemManagerInterface
 * @package Demo\CartBundle\Entity
 *
 * Interface for shopping item (product) management
 * Provides data access layer
 * Acts as an abstraction layer between controller and data model, hides details and type of persistance.
 *
 * Every entity type has its own manager to provide easier maintainance and separation of concerns, this also leads
 * to ease in adopting and implementing scailability solutions. (If we decided to migrate to another database
 * for this specific entity for example).
 */
interface ShoppingItemManagerInterface
{
    /**
     * Create new shopping item (product)
     *
     * @param $item
     * @return AbstractShoppingItem
     */
    public function create(AbstractShoppingItem $item);

    /**
     * Delete item by id
     *
     * @param $item
     */
    public function delete($item);

    /**
     * Update the item
     *
     * @param $item
     * @return AbstractShoppingItem
     */
    public function update(AbstractShoppingItem $item);

    /**
     * find item by id
     *
     * @param $id
     * @return AbstractShoppingItem
     */
    public function findById($id);

    /**
     * Get all shopping items [for testing]
     *
     * @return AbstractShoppingItem[]
     */
    public function findAll();
}