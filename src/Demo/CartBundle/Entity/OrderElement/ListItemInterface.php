<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/30/2016
 * Time: 6:29 AM
 */

namespace Demo\CartBundle\Entity\OrderElement;


use Demo\CartBundle\Entity\Cart\AbstractWishList;

/**
 * Interface ListItemInterface
 * @package Demo\CartBundle\Entity\OrderElement
 *
 * interface to define item that belongs to a certain list
 */
interface ListItemInterface
{
    public function getList();

    public function setList(AbstractWishList $list);
}