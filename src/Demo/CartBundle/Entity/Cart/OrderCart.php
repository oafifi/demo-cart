<?php

namespace Demo\CartBundle\Entity\Cart;

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
class OrderCart extends AbstractOrderCart
{
    /**
     * 
     * @inheritDoc
     */
    public function getSubtotal()
    {
        $subtotal = 0;
        foreach($this->items as $orderItem){
            $subtotal += $orderItem->getTotal();
        }

        return $subtotal;
    }

    /**
     * @inheritDoc
     */
    public function checkout()
    {
        // TODO: Implement checkout() method.
    }


}
