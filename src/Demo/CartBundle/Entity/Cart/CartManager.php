<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 2:00 AM
 */

namespace Demo\CartBundle\Entity\Cart;

use Demo\CartBundle\Entity\OrderElement\OrderItem;
use Demo\CartBundle\Entity\OrderElement\AbstractOrderItem;
use Demo\CartBundle\Entity\OrderElement\WishOrderItemInterface;
use Demo\CartBundle\Entity\Product\AbstractShoppingItem;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

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
    public function getUserCart()
    {
        /*
         * Here should be logic to get user cart (assuming that every user is assigned one cart)
         * I will get cart with id = 1 for testing purpose
         */

        return $this->findById(1); //assume this is the user cart (To be omitted)
    }

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
    public function update(AbstractOrderCart $cart)
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
    public function addShoppingItem(AbstractShoppingItem $item)
    {
        /*
         * Here should be logic to get user cart (assuming that every user is assigned one cart)
         * I will get cart with id = 1 for testing purpose
         */

        $cart = $this->getUserCart();

        $orderItem = $cart->addItem($item);

        if($orderItem->getId()){
            $this->em->merge($orderItem);
        }
        else{
            $this->em->persist($orderItem);
        }

        $this->em->flush();

        return $orderItem;
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
    public function removeItem(AbstractOrderItem $item)
    {
        $cart = $this->getUserCart();

        $removed = $cart->removeItem($item);

        $this->em->flush();

        return $removed;
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

        $cart = $this->getUserCart();

        $cart->clear();

        $this->em->flush();
    }
}