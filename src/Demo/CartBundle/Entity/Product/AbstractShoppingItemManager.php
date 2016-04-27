<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 2:16 PM
 */

namespace Demo\CartBundle\Entity\Product;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class AbstractShoppingItemManager
 * @package Demo\CartBundle\Entity
 *
 * Shopping item manager and data access layer
 * Uses doctrine orm entity manager
 */
abstract class AbstractShoppingItemManager implements ShoppingItemManagerInterface
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
    public abstract function create(ShoppingItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function delete($item);

    /**
     * @inheritDoc
     */
    public abstract function update(ShoppingItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function findById($id);

    /**
     * @inheritDoc
     */
    public abstract function findAll();
}