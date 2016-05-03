<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/23/2016
 * Time: 10:42 PM
 */

namespace Demo\CartBundle\Controller;

use Demo\CartBundle\Entity\Product\SaleItem;
use Demo\CartBundle\Entity\Product\ShoppingItem;
use Demo\CartBundle\Form\Type\AddToCartType;
use Demo\CartBundle\Form\Type\AddToListType;
use Demo\CartBundle\Form\Type\SaleItemType;
use Symfony\Component\HttpFoundation\Request;
use Demo\CartBundle\Form\Type\ShoppingItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

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

            $pm = $this->get("demo_cart.shopping_item_manager");

            $item = $pm->create($item);

            return $this->redirectToRoute("demo_cart_product_view", array("id"=>$item->getId()));
        }

        return $this->render('DemoCartBundle:Product:create.html.twig', array('form' => $form->createView()));
    }

    public function listAllAction() //For testing only, not logic to get all elements
    {
        $pm = $this->get("demo_cart.shopping_item_manager");
        $lm = $this->get("demo_cart.list_manager");

        $items = $pm->findAll();

        //Add the add to cart form, can ve injected as a service also
        foreach($items as $item) {
            $form = $this->createForm(AddToCartType::class, null, array(
                'action' => $this->generateUrl('demo_cart_cart_add_item'),
                'method' => 'POST',
            ));

            $item->form = $form->createView();
        }

        //Add the add to list form, can ve injected as a service also
        $userLists = $lm->getUserLists();
        foreach($items as $item) {
            $form = $this->createForm(AddToListType::class, null, array(
                'action' => $this->generateUrl('demo_cart_list_add_item'),
                'method' => 'POST',
                'lists' => $userLists,
            ));

            $item->listForm = $form->createView();
        }

        return $this->render('DemoCartBundle:Product:list.html.twig', array(
            'items' => $items,
        ));
    }

    public function viewAction($id)
    {
        $pm = $this->get("demo_cart.shopping_item_manager");

        $item = $pm->findById($id);

        if(!$item)
        {
            throw $this->createNotFoundException('The item is not found');
        }

        $addToCartForm = $this->createForm(AddToCartType::class, null, array(
            'action' => $this->generateUrl('demo_cart_cart_add_item'),
            'method' => 'POST',
        ));

        return $this->render('DemoCartBundle:Product:view.html.twig', array(
            'item' => $item,
            'addToCartForm' => $addToCartForm->createView()
        ));
    }
}