<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/30/2016
 * Time: 6:28 AM
 */

namespace Demo\CartBundle\Entity\OrderElement;

use Demo\CartBundle\Entity\Cart\AbstractWishList;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ListOrderItem
 * @package Demo\CartBundle\Entity\OrderElement
 *
 * @ORM\Entity
 *
 * order item that shows the wish list it belongs to
 */
class ListOrderItem extends OrderItem implements ListItemInterface
{
    /**
     * @ORM\ManyToOne(targetEntity="Demo\CartBundle\Entity\Cart\WishList", inversedBy="items")
     * @ORM\JoinColumn(name="wishlist_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $list;

    /**
     * @inheritDoc
     */
    public function getList()
    {
        return $this->list;
    }

    public function setList(AbstractWishList $list)
    {
        $this->list = $list;
    }
}