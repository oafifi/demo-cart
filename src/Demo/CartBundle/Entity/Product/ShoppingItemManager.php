<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/25/2016
 * Time: 2:20 PM
 */

namespace Demo\CartBundle\Entity\Product;


/**
 * Class ShoppingItemManager
 * @package Demo\CartBundle\Entity
 *
 * Shopping item manager and data access layer
 * Uses doctrine orm entity manager
 */
class ShoppingItemManager extends AbstractShoppingItemManager
{
    const REPO = 'DemoCartBundle:Product\ShoppingItem';

    /**
     * @inheritDoc
     */
    public function create(ShoppingItem $item)
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
    public function update(ShoppingItem $item)
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