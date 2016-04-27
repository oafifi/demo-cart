<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 1:49 AM
 */

namespace Demo\CartBundle\Entity\Cart;


use Demo\CartBundle\Entity\OrderElement\OrderItemInterface;
use Demo\CartBundle\Entity\OrderElement\WishOrderItemInterface;
use Demo\CartBundle\Entity\Product\ShoppingItemInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Base class for classes implementing CartManagerInterface
 * Uses doctrine orm entity manager
 *
 * Class AbstractCartManager
 * @package Demo\CartBundle\Entity
 */
abstract class AbstractCartManager implements CartManagerInterface
{
    protected $em;
    protected $repo;

    function __construct(ObjectManager $em,$repository)
    {
        $this->em = $em;
        $this->repo = $repository;
    }

    /**
     * @inheritDoc
     */
    public abstract function create();

    /**
     * @inheritDoc
     */
    public abstract function delete($cart);

    /**
     * @inheritDoc
     */
    public abstract function update(OrderCartInterface $cart);

    /**
     * @inheritDoc
     */
    public abstract function findById($id);

    /**
     * @inheritDoc
     */
    public abstract function addShoppingItem(ShoppingItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function addOrderItem(OrderItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function addWishOrderItem(WishOrderItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function removeItem(OrderItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function emptyCart();

}