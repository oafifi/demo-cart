<?php

namespace Demo\CartBundle\Entity;

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
 * @ORM\DiscriminatorMap({"normal" = "OrderItem", "wish" = "WishOrderItem"})
 */
class OrderItem extends AbstractOrderItem
{

}
