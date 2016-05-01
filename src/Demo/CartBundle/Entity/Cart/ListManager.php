<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 5/1/2016
 * Time: 5:16 AM
 */

namespace Demo\CartBundle\Entity\Cart;


use Demo\CartBundle\Entity\OrderElement\AbstractOrderItem;
use Demo\CartBundle\Entity\OrderElement\WishOrderItemInterface;
use Demo\CartBundle\Entity\Product\AbstractShoppingItem;
use Doctrine\Common\Persistence\ObjectManager;

class ListManager extends AbstractListManager
{
    protected $repo;

    /**
     * ListManager constructor.
     * @param ObjectManager $entityManager
     * @param $repo
     */
    public function __construct(ObjectManager $entityManager,$repo)
    {
        parent::__construct($entityManager);

        $this->repo = $repo;
    }


    /**
     * Create new list
     *
     * @param AbstractWishList $list
     * @return int
     */
    public function create(AbstractWishList $list)
    {
        $this->em->persist($list);
        $this->em->flush();

        return $list->getId();
    }

    /**
     * Delete cart by id
     *
     * @param $listId
     * @return mixed
     */
    public function delete($listId)
    {
        $list = $this->findById($listId);
        if(!$list){
            return $list;
        }

        $this->em->remove($list);
        $this->em->flush();

        return true;
    }

    /**
     * Update the list
     *
     * @param AbstractWishList $list
     * @return AbstractWishList
     */
    public function update(AbstractWishList $list)
    {
        $this->em->merge($list);
        $this->em->flush();

        return $list;
    }

    /**
     * find list by id
     *
     * @param $id
     * @return AbstractWishList
     */
    public function findById($id)
    {
        return $this->em->getRepository($this->repo)->find($id);
    }

    /**
     * Add shopping item to the cart
     *
     * @param AbstractShoppingItem $item
     * @param AbstractWishList $list
     * @return AbstractOrderItem
     */
    public function addShoppingItem(AbstractShoppingItem $item, AbstractWishList $list)
    {

        $orderItem = $list->addItem($item);

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
     * Add wish list item to the list
     *
     * @param WishOrderItemInterface $item
     * @return mixed
     */
    public function addWishOrderItem(WishOrderItemInterface $item)
    {
        // TODO: Implement addWishOrderItem() method.
    }

    /**
     * remove item from the list
     *
     * @param AbstractOrderItem $item
     * @param $listId
     * @return mixed
     */
    public function removeItem(AbstractOrderItem $item, $listId)
    {
        $list = $this->findById($listId);

        $removed = $list->removeItem($item);

        $this->em->flush();

        return $removed;
    }

    /**
     * Empty the list, remove all elements
     *
     * @param $listId
     * @return AbstractOrderCart
     */
    public function emptyCart($listId)
    {
        $list = $this->findById($listId);
        $list->clear();

        $this->em->flush();
    }

    /**
     * return list of user lists
     * @return mixed
     */
    public function getUserLists()
    {
        //for testing, gets all lists created

        return $this->em->getRepository($this->repo)->findAll();
    }
}