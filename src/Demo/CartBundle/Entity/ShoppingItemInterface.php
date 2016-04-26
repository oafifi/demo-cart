<?php


namespace Demo\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ShoppingItemInterface
 * @package Demo\CartBundle\Entity
 *
 * Interface for Shopping items
 *
 */
interface ShoppingItemInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param mixed $name
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @param mixed $description
     */
    public function setDescription($description);

    /**
     * returns the actual price of the item
     *
     * @return mixed
     */
    public function getPrice();

    /**
     * The original price
     *
     * @param mixed $price
     */
    public function setPrice($price);

    /**
     * @return mixed
     */
    public function getInStock();

    /**
     * @param mixed $inStock
     */
    public function setInStock($inStock);

    /**
     * returns the net price of an item after discount(if exists) or other item price manipulation
     * The price used in transactions
     *
     * @return mixed
     */
    public function getNetPrice();
}
