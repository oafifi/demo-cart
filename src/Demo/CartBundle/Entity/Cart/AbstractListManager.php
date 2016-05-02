<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 5/1/2016
 * Time: 5:12 AM
 */

namespace Demo\CartBundle\Entity\Cart;


use Doctrine\Common\Persistence\ObjectManager;

/**
 * Base class for classes implementing ListManagerInterface
 * Uses doctrine object manager
 *
 * Class AbstractListManager
 * @package Demo\CartBundle\Entity\Cart
 */
abstract class AbstractListManager implements ListManagerInterface
{
    protected $em;
    protected $repo;

    function __construct(ObjectManager $em,$repository)
    {
        $this->em = $em;
        $this->repo = $repository;
    }
}