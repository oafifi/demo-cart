<?php


namespace Demo\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ShoppingItem
 * @package Demo\CartBundle\Entity
 *
 * Implementation for the basic shopping item,and also provides data access methods.
 *
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"normal" = "ShoppingItem", "sale" = "SaleItem"})
 */
class ShoppingItem extends AbstractShoppingItem
{


}
