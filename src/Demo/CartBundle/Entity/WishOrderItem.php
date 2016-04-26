<?php

namespace Demo\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class WishOrderItem
 * @package Demo\CartBundle\Entity
 *
 * Wish list order item.
 *
 * @ORM\Entity
 */
class WishOrderItem extends OrderItem implements WishOrderItemInterface
{
    /**
     * @ORM\Column(type="text")
     */
    protected $comment;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $important;

    /**
     * @ORM\ManyToOne(targetEntity="WishList", inversedBy="items")
     * @ORM\JoinColumn(name="wishlist_id", referencedColumnName="id")
     */
    protected $wishList;


    /**
     * Set comment
     *
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set important
     *
     * @param boolean $important
     */
    public function setImportant($important)
    {
        $this->important = $important;
    }

    /**
     * Get important
     *
     * @return boolean 
     */
    public function getImportant()
    {
        return $this->important;
    }

    /**
     * @inheritDoc
     */
    public function getWishList()
    {
        return $this->wishList;
    }


}
