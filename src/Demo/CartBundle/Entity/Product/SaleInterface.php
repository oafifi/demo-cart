<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/26/2016
 * Time: 6:17 PM
 */

namespace Demo\CartBundle\Entity\Product;


interface SaleInterface
{
    /**
     * Set discount in percentage
     *
     * @param integer $discount
     * @return SaleItem
     */
    public function setDiscount($discount);

    /**
     * Get discount in percentage
     *
     * @return mixed
     */
    public function getDiscount();

    /**
     * Get discount value
     *
     * @return mixed
     */
    public function getDiscountValue();
}