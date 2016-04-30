<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 4:52 PM
 */

namespace Demo\CartBundle\Entity\OrderElement;


/**
 * Interface OrderItemManagerInterface
 * @package Demo\CartBundle\Entity
 *
 * Interface for order item management
 * Provides data access layer
 */
interface OrderItemManagerInterface
{
    /**
     * Create new order item
     *
     * @param $item
     * @return mixed
     */
    public function create(AbstractOrderItem $item);

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
    public function update(AbstractOrderItem $item);

    /**
     * find item by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Get all order items
     *
     * @return mixed
     */
    public function findAll();
}