<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/26/2016
 * Time: 4:51 PM
 */

namespace Demo\CartBundle\Entity;


interface WishListInterface extends CartInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set publicList
     *
     * @param boolean $public
     */
    public function setPublic($public);

    /**
     * Get publicList
     *
     * @return boolean
     */
    public function getPublic();
}