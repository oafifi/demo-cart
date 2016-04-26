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
class SaleItem extends ShoppingItem implements SaleItemInterface
{
    /**
     * discount in percentage
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $discount;



    /**
     * Set discount in percentage
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
     * Get discount in percentage
     *
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Get discount value
     *
     * @return mixed
     */
    public function getDiscountValue()
    {
        return $this->getPrice()*$this->getDiscount()/100;
    }

    /**
     * @inheritDoc
     */
    public function getNetPrice()
    {
        $price = parent::getNetPrice();
        return $price-$this->getDiscountValue();

    }


}
