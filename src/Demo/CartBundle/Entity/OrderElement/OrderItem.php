<?php

namespace Demo\CartBundle\Entity\OrderElement;

use Demo\CartBundle\Entity\AbstractShoppingItem;
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
class OrderItem implements OrderItemInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="ShoppingItem")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     */
    protected $item;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return AbstractShoppingItem
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     */
    public function setItem(AbstractShoppingItem $item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

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
