<?php

namespace Demo\CartBundle\Entity\OrderElement;

use Demo\CartBundle\Entity\Product\ShoppingItemInterface;

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
     * @return ShoppingItemInterface
     */
    public function getItem();

    /**
     * @param mixed $item
     */
    public function setItem(ShoppingItemInterface $item);

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
