<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 2:16 PM
 */

namespace Demo\CartBundle\Entity\Product;

use Doctrine\ORM\EntityManager;

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

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    public abstract function create(ShoppingItem $item);

    /**
     * @inheritDoc
     */
    public abstract function delete($item);

    /**
     * @inheritDoc
     */
    public abstract function update(ShoppingItem $item);

    /**
     * @inheritDoc
     */
    public abstract function findById($id);

    /**
     * @inheritDoc
     */
    public abstract function findAll();
}