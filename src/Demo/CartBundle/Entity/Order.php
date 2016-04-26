<?php

namespace Demo\CartBundle\Entity;

use Demo\CartBundle\Entity\OrderElement\OrderItemInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 * @package Demo\CartBundle\Entity
 *
 * @ORM\Entity
 */
class Order extends AbstractOrder
{

    /**
     * Add itemList
     *
     * @param OrderItemInterface $itemList
     * @return Order
     */
    public function addItemList(OrderItemInterface $itemList)
    {
        $this->itemList[] = $itemList;

        return $this;
    }

    /**
     * Remove itemList
     *
     * @param OrderItemInterface $itemList
     */
    public function removeItemList(OrderItemInterface $itemList)
    {
        $this->itemList->removeElement($itemList);
    }
}
