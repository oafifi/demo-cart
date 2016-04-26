<?php

namespace Demo\CartBundle\Entity;


/**
 * Class OrderItemInterface
 * @package Demo\CartBundle\Entity
 *
 * Interface for order items (items to be ordered)
 *
 */
interface OrderItemInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return AbstractShoppingItem
     */
    public function getItem();

    /**
     * @param mixed $item
     */
    public function setItem(AbstractShoppingItem $item);

    /**
     * @return mixed
     */
    public function getQuantity();

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity);

    /**
     * returns the total value of the order item
     *
     * @return mixed
     */
    public function getTotal();

}
