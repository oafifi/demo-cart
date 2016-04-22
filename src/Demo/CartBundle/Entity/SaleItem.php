<?php

namespace Demo\CartBundle\Entity;

/**
 * Class SaleItem
 * @package Demo\CartBundle\Entity
 *
 * Implementation for sale shopping item,and also provides data access methods.
 */
class SaleItem extends NormalItem
{
    protected $discount;
}