<?php

namespace Demo\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderCart
 * @package Demo\CartBundle\Entity
 *
 * Orders cart that holds order items, and create order from its contents (checkout).
 * Provides data access methods.
 *
 * @ORM\Entity
 */
class OrderCart extends AbstractCart implements EntityDataAccessInterface, CheckoutInterface
{
    /**
     * @inheritDoc
     */
    public function checkout()
    {
        // TODO: Implement checkout() method.
    }

    /**
     * @inheritDoc
     */
    public function getTotalCost()
    {
        // TODO: Implement getTotalCost() method.
    }

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
     * @return OrderCart
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
