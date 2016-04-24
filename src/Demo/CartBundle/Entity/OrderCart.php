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
class OrderCart extends AbstractCart implements OrderCartInterface
{
    /**
     * 
     * @inheritDoc
     */
    public function getSubtotal()
    {
        $subtotal = 0;
        foreach($this->itemList as $orderItem){
            $subtotal += $orderItem->getTotal();
        }

        return $subtotal;
    }

}
