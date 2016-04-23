<?php

namespace Demo\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class SaleItem
 * @package Demo\CartBundle\Entity
 *
 * Implementation for sale shopping item,and also provides data access methods.
 *
 * @ORM\Entity
 */
class SaleItem extends ShoppingItem
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $discount;



    /**
     * Set discount
     *
     * @param integer $discount
     * @return SaleItem
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return integer 
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}
