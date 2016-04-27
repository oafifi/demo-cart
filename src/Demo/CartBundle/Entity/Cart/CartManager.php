<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 2:00 AM
 */

namespace Demo\CartBundle\Entity\Cart;

use Demo\CartBundle\Entity\OrderElement\OrderItem;
use Demo\CartBundle\Entity\OrderElement\OrderItemInterface;
use Demo\CartBundle\Entity\OrderElement\WishOrderItemInterface;
use Demo\CartBundle\Entity\Product\ShoppingItemInterface;

/**
 * Class CartManager
 * @package Demo\CartBundle\Entity
 *
 * Cart manager and data access layer
 * Uses doctrine orm entity manager
 */
class CartManager extends AbstractCartManager
{
    /**
     * @inheritDoc
     */
    public function create()
    {
        $cart = new OrderCart();

        $this->em->persist($cart);
        $this->em->flush();

        return $cart->getId();
    }

    /**
     * @inheritDoc
     */
    public function delete($cart)
    {
        $cart = $this->em->getRepository($this->repo)->find($cart);
        $this->em->remove($cart);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function update(OrderCartInterface $cart)
    {
        $cart = $this->em->merge($cart);
        $this->em->flush();

        return $cart;
    }

    /**
     * @inheritDoc
     */
    public function findById($id)
    {
        return $this->em->getRepository($this->repo)->find($id);
    }


    /**
     * @inheritDoc
     */
    public function addShoppingItem(ShoppingItemInterface $item)
    {
        /*
         * Here should be logic to get user cart (assuming that every user is assigned one cart)
         * I will get cart with id = 1 for testing purpose
         */

        $cart = $this->findById(1); //assume this is the user cart (To be omitted)

        $orderItem = $cart->addItem($item);

        if($orderItem->getId()){
            $this->em->merge($orderItem);
        }
        else{
            $this->em->persist($orderItem);
        }

        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function addWishOrderItem(WishOrderItemInterface $item)
    {
        // TODO: Implement addWishOrderItem() method.
    }

    /**
     * @inheritDoc
     */
    public function removeItem(OrderItemInterface $item)
    {
        // TODO: Implement removeItem() method.
    }

    /**
     * @inheritDoc
     */
    public function emptyCart()
    {
        /*
         * Here should be logic to get user cart (assuming that every user is assigned one cart)
         * I will get cart with id = 1 for testing purpose
         */

        $cart = $this->findById(1); //assume this is the user cart (To be omitted)

        $cart->emptyCart();

        return $this->update($cart);
    }
}