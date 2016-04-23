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
class OrderItem extends AbstractOrderItem implements EntityDataAccessInterface
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

}
