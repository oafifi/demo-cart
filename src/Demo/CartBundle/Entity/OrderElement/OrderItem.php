<?php

namespace Demo\CartBundle\Entity\OrderElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderItem
 * @package Demo\CartBundle\Entity
 *
 * The item to be ordered
 *
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"normal" = "OrderItem", "list" = "ListOrderItem", "detailed_wish" = "WishOrderItem"})
 */
class OrderItem extends AbstractOrderItem
{
    /**
     * returns the total value of the order item
     *
     * @return mixed
     */
    public function getTotal()
    {
        return $this->getQuantity()*$this->getItem()->getNetPrice();
    }
}
