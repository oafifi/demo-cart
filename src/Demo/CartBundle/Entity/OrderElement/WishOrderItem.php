<?php

namespace Demo\CartBundle\Entity\OrderElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class WishOrderItem
 * @package Demo\CartBundle\Entity
 *
 * Wish list order item.
 *
 * @ORM\Entity
 */
class WishOrderItem extends AbstractWishOrderItem implements DetailedWishItemInterface
{

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $important;


    /**
     * WishOrderItem constructor.
     * @internal param $important
     * @internal param $subItems
     */
    public function __construct()
    {
        parent::__construct();
        $this->important = false;
    }


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



}
