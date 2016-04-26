<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 1:49 AM
 */

namespace Demo\CartBundle\Entity\Cart;


use Doctrine\ORM\EntityManager;

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

    function __construct(EntityManager $em)
    {
        $this->em = $em;
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
    public abstract function update($cart);

    /**
     * @inheritDoc
     */
    public abstract function findById($id);

    /**
     * @inheritDoc
     */
    public abstract function addShoppingItem($item, $quantity);

    /**
     * @inheritDoc
     */
    public abstract function addOrderItem($item);

    /**
     * @inheritDoc
     */
    public abstract function addWishOrderItem($item);

    /**
     * @inheritDoc
     */
    public abstract function removeItem($item);

    /**
     * @inheritDoc
     */
    public abstract function emptyCart();

}