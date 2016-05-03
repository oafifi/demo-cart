<?php

namespace Demo\CartBundle\Entity;

use Demo\CartBundle\Entity\OrderElement\AbstractOrderItem;
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
     * @param AbstractOrderItem $itemList
     * @return Order
     */
    public function addItemList(AbstractOrderItem $itemList)
    {
        $this->itemList[] = $itemList;

        return $this;
    }

    /**
     * Remove itemList
     *
     * @param AbstractOrderItem $itemList
     */
    public function removeItemList(AbstractOrderItem $itemList)
    {
        $this->itemList->removeElement($itemList);
    }
}
