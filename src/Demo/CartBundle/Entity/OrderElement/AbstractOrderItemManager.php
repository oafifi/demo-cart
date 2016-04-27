<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 5:07 PM
 */

namespace Demo\CartBundle\Entity\OrderElement;


use Doctrine\Common\Persistence\ObjectManager;

abstract class AbstractOrderItemManager implements OrderItemManagerInterface
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
    public abstract function create(OrderItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function delete($item);

    /**
     * @inheritDoc
     */
    public abstract function update(OrderItemInterface $item);

    /**
     * @inheritDoc
     */
    public abstract function findById($id);

    /**
     * @inheritDoc
     */
    public abstract function findAll();

}