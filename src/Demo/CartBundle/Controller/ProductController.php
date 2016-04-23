<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/23/2016
 * Time: 10:42 PM
 */

namespace Demo\CartBundle\Controller;

use Demo\CartBundle\Form\Type\SaleItemType;
use Symfony\Component\HttpFoundation\Request;
use Demo\CartBundle\Form\Type\ShoppingItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Demo\CartBundle\Entity\ShoppingItem;
use Demo\CartBundle\Entity\SaleItem;

class ProductController extends Controller
{
    public function createAction(Request $request, $type)
    {
        if(strcmp($type, "sale-item") === 0) {
            $item = new SaleItem();
            $class = SaleItemType::class;
        }
        else{
            $item = new ShoppingItem();
            $class = ShoppingItemType::class;
        }

        $form = $this->createForm($class, $item);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //TODO: Persist item

            print_r($item);
            return $this->render('DemoCartBundle:Default:index.html.twig');
        }

        return $this->render('DemoCartBundle:Product:create.html.twig', array('form' => $form->createView()));
    }
}