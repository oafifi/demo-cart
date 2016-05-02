<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/27/2016
 * Time: 4:44 PM
 */

namespace Demo\CartBundle\Controller;


use Demo\CartBundle\Form\Type\AddToCartType;
use Demo\CartBundle\Form\Type\EditCartItemType;
use Demo\CartBundle\Form\Type\EmptyCartType;
use Demo\CartBundle\Form\Type\RemoveFromCartType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * Cart view action takes no query parameters because cart is assigned to user
     * it will get the current user cart
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction()
    {
        $cart = $this->get("demo_cart.cart_manager")->getUserCart();

        if(!$cart){
            $this->createNotFoundException("Error: user cart not found");
        }

        //Add empty cart button
        $emptyForm = $this->createForm(EmptyCartType::class, null, array(
            'action' => $this->generateUrl('demo_cart_cart_empty'),
            'method' => 'POST',
        ));

        $cartItems = $cart->getItems();

        //Add the remove item from cart form, can ve injected as a service also
        foreach($cartItems as $item) {
            $removeForm = $this->createForm(RemoveFromCartType::class, null, array(
                'action' => $this->generateUrl('demo_cart_cart_remove_item'),
                'method' => 'POST',
            ));

            $editForm = $this->createForm(EditCartItemType::class, null, array(
                'action' => $this->generateUrl('demo_cart_orderitem_edit'),
                'method' => 'POST',
            ));

            $item->removeForm = $removeForm->createView();
            $item->editForm = $editForm->createView();
        }

        return $this->render('DemoCartBundle:Cart:view.html.twig', array(
            'cart' => $cart,
            'emptyForm' => $emptyForm->createView()
        ));
    }

    public function emptyAction()
    {
        $this->get("demo_cart.cart_manager")->emptyCart();


        return $this->redirectToRoute("demo_cart_cart_view");
    }

    public function addAction(Request $request, $type)
    {

        $form = $this->createForm(AddToCartType::class);    //could be created as a service

        $form->handleRequest($request);

        $id = null;

        if ($form->isSubmitted() && $form->isValid()) {

            $id = $form->getData()['product_id'];
        }
        else{
            $response = new Response('Bad request', Response::HTTP_BAD_REQUEST);    //just dummy response for this demo
            $response->send();
        }

        //$arr = $request->request->get("form");
        //$id=$arr["id"];

        if(strcmp($type,'order-item') === 0)
        {
            $item = $this->get("demo_cart.order_item_manager")->findById($id);
            $orderItem = $this->get("demo_cart.cart_manager")->addWishOrderItem($item);
        }
        else {
            $item = $this->get("demo_cart.shopping_item_manager")->findById($id);
            $orderItem = $this->get("demo_cart.cart_manager")->addShoppingItem($item);
        }

        if(!$orderItem){
            return $this->redirectToRoute("demo_cart_cart_view", array(
                'error' => 'Error: failed to add the item'
            ));
        }

        return $this->redirectToRoute("demo_cart_cart_view");
    }

    public function removeAction(Request $request)
    {

        $form = $this->createForm(RemoveFromCartType::class);    //could be created as a service

        $form->handleRequest($request);

        $id = null;

        if ($form->isSubmitted() && $form->isValid()) {

            $id = $form->getData()['order_item_id'];
        }
        else{
            $response = new Response('Bad request', Response::HTTP_BAD_REQUEST);    //just dummy response for this demo
            $response->send();
        }

        $orderItem = $this->get("demo_cart.order_item_manager")->findById($id);
        $removed = $this->get("demo_cart.cart_manager")->removeItem($orderItem);

        if(!$removed){
            return $this->redirectToRoute("demo_cart_cart_view", array(
                'error' => 'Error: failed to remove item'
            ));
        }

        return $this->redirectToRoute("demo_cart_cart_view");
    }
}