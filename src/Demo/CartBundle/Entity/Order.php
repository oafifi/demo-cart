<?php

namespace Demo\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 * @package Demo\CartBundle\Entity
 *
 * @ORM\Entity
 */
class Order extends AbstractOrder implements EntityDataAccessInterface
{
    /**
     * @inheritDoc
     */
    public function save()
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritDoc
     */
    public function remove()
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public static function find($id)
    {
        // TODO: Implement find() method.
    }






    /**
     * Add itemList
     *
     * @param \Demo\CartBundle\Entity\OrderItem $itemList
     * @return Order
     */
    public function addItemList(\Demo\CartBundle\Entity\OrderItem $itemList)
    {
        $this->itemList[] = $itemList;

        return $this;
    }

    /**
     * Remove itemList
     *
     * @param \Demo\CartBundle\Entity\OrderItem $itemList
     */
    public function removeItemList(\Demo\CartBundle\Entity\OrderItem $itemList)
    {
        $this->itemList->removeElement($itemList);
    }
}
