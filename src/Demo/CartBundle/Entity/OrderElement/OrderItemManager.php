<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 5:12 PM
 */

namespace Demo\CartBundle\Entity\OrderElement;


class OrderItemManager extends AbstractOrderItemManager
{

    /**
     * @inheritDoc
     */
    public function create(AbstractOrderItem $item)
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
    public function update(AbstractOrderItem $item)
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
        return $this->em->getRepository($this->repo)->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findAll()
    {
        return $this->em->getRepository($this->repo)->findAll();
    }


}