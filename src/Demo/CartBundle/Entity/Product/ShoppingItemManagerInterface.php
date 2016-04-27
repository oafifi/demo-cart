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
 */
interface ShoppingItemManagerInterface
{
    /**
     * Create new shopping item (product)
     *
     * @param $item
     * @return mixed
     */
    public function create(ShoppingItemInterface $item);

    /**
     * Delete item by id
     *
     * @param $item
     * @return mixed
     */
    public function delete($item);

    /**
     * Update the item
     *
     * @param $item
     * @return mixed
     */
    public function update(ShoppingItemInterface $item);

    /**
     * find item by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Get all shopping items [for testing]
     *
     * @return mixed
     */
    public function findAll();
}