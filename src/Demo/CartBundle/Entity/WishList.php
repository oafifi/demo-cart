<?php

namespace Demo\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class WishList
 * @package Demo\CartBundle\Entity
 *
 * Wish list that holds order items.
 * Provides data access methods.
 *
 * @ORM\Entity
 * @ORM\AssociationOverrides({
 *      @ORM\AssociationOverride(name="itemList",
 *          joinTable=@ORM\JoinTable(
 *              name="wishlist_items",
 *              joinColumns=@ORM\JoinColumn(name="list_id", referencedColumnName="id"),
 *              inverseJoinColumns=@ORM\JoinColumn(name="item_id", referencedColumnName="id", unique=true)
 *          )
 *      )
 * })
 */
class WishList extends AbstractCart implements EntityDataAccessInterface
{
    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $public;

    /**
     * @inheritDoc
     */
    public function save()
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritDoc
     */
    public function remove()
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public static function find($id)
    {
        // TODO: Implement find() method.
    }


    /**
     * Set description
     *
     * @param string $description
     * @return WishList
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set publicList
     *
     * @param boolean $public
     * @return WishList
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get publicList
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Add itemList
     *
     * @param \Demo\CartBundle\Entity\OrderItem $itemList
     * @return WishList
     */
    public function addItemList(\Demo\CartBundle\Entity\OrderItem $itemList)
    {
        $this->itemList[] = $itemList;

        return $this;
    }

    /**
     * Remove itemList
     *
     * @param \Demo\CartBundle\Entity\OrderItem $itemList
     */
    public function removeItemList(\Demo\CartBundle\Entity\OrderItem $itemList)
    {
        $this->itemList->removeElement($itemList);
    }
}
