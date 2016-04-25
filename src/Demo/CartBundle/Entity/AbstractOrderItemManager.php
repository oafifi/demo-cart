<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 5:07 PM
 */

namespace Demo\CartBundle\Entity;


use Doctrine\ORM\EntityManager;

abstract class AbstractOrderItemManager implements OrderItemManagerInterface
{
    protected $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    public abstract function create(OrderItem $item);

    /**
     * @inheritDoc
     */
    public abstract function delete($item);

    /**
     * @inheritDoc
     */
    public abstract function update(OrderItem $item);

    /**
     * @inheritDoc
     */
    public abstract function findById($id);

    /**
     * @inheritDoc
     */
    public abstract function findAll();

}