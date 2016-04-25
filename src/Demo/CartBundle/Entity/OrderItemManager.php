<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 5:12 PM
 */

namespace Demo\CartBundle\Entity;


class OrderItemManager extends AbstractOrderItemManager
{
    const REPO = 'DemoCartBundle:OrderItem';    //repository used

    /**
     * @inheritDoc
     */
    public function create(OrderItem $item)
    {
        $this->em->persist($item);
        $this->em->flush();

        return $item;
    }

    /**
     * @inheritDoc
     */
    public function delete($item)
    {
        $item = $this->findById($item);
        $this->em->remove($item);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function update(OrderItem $item)
    {
        $item = $this->em->merge($item);
        $this->em->flush();

        return $item;
    }

    /**
     * @inheritDoc
     */
    public function findById($id)
    {
        return $this->em->getRepository(self::REPO)->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findAll()
    {
        return $this->em->getRepository(self::REPO)->findAll();
    }


}