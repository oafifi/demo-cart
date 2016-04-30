<?php

namespace Demo\CartBundle\Entity\OrderElement;

use Demo\CartBundle\Entity\Product\AbstractShoppingItem;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractOrderItem
 * @package Demo\CartBundle\Entity
 *
 * Interface for order items (items to be ordered)
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractOrderItem
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Demo\CartBundle\Entity\Product\ShoppingItem")
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
    public abstract function getTotal();

}
