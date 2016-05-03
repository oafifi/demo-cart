<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 5/1/2016
 * Time: 12:07 AM
 */

namespace Demo\CartBundle\Controller;


use Demo\CartBundle\Entity\Cart\WishList;
use Demo\CartBundle\Form\Type\AddToCartType;
use Demo\CartBundle\Form\Type\AddToListType;
use Demo\CartBundle\Form\Type\EditCartItemType;
use Demo\CartBundle\Form\Type\EmptyCartType;
use Demo\CartBundle\Form\Type\RemoveCartType;
use Demo\CartBundle\Form\Type\RemoveFromCartType;
use Demo\CartBundle\Form\Type\WishListType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListController extends Controller
{
    /**
     * Wish list view with list id
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        $list = $this->get("demo_cart.list_manager")->findById($id);

        if(!$list){
            $this->createNotFoundException("Error: user cart not found");
        }

        //Add empty list button
        $emptyForm = $this->createForm(EmptyCartType::class, null, array(
            'action' => $this->generateUrl('demo_cart_list_empty'),
            'method' => 'POST',
        ));

        $listItems = $list->getItems();

        //Add the remove item from list form, can be injected as a service also
        foreach($listItems as $item) {
            $removeForm = $this->createForm(RemoveFromCartType::class, null, array(
                'action' => $this->generateUrl('demo_cart_list_remove_item'),
                'method' => 'POST',
            ));

            $cartForm = $this->createForm(AddToCartType::class, null, array(
                'action' => $this->generateUrl('demo_cart_cart_add_item', array("type" => "order-item")),
                'method' => 'POST',
            ));

            $item->removeForm = $removeForm->createView();
            $item->cartForm = $cartForm->createView();
        }

        return $this->render('DemoCartBundle:List:view.html.twig', array(
            'list' => $list,
            'emptyForm' => $emptyForm->createView()
        ));
    }

    public function createAction(Request $request)
    {

        $list = new WishList();
        $form = $this->createForm(WishListType::class, $list);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $lm = $this->get("demo_cart.list_manager");

            $list = $lm->create($list);

            if($list) {
                return $this->redirectToRoute("demo_cart_list_view", array("id" => $list));
            }

        }

        return $this->render('DemoCartBundle:List:create.html.twig', array('form' => $form->createView()));
    }

    public function removeAction(Request $request)
    {
        $form = $this->createForm(RemoveCartType::class);    //could be created as a service

        $form->handleRequest($request);

        $id = null;

        if ($form->isSubmitted() && $form->isValid()) {

            $id = $form->getData()['cart_id'];
        }
        else{
            $response = new Response('Bad request', Response::HTTP_BAD_REQUEST);    //just dummy response for this demo
            $response->send();
        }

        $removed = $this->get("demo_cart.list_manager")->delete($id);

        if(!$removed){
            return $this->redirectToRoute("demo_cart_list_list", array(
                'error' => 'Error: failed to remove item'
            ));
        }

        return $this->redirectToRoute("demo_cart_list_list");
    }

    public function updateAction(Request $request, $id)
    {

        $lm = $this->get("demo_cart.list_manager");

        $list = $lm->findById($id);

        if(!$list)
        {
            throw $this->createNotFoundException('The list is not found');
        }

        $form = $this->createForm(WishListType::class, $list);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $list = $lm->update($list);

            return $this->redirectToRoute("demo_cart_list_view", array("id"=>$list->getId()));
        }

        return $this->render('DemoCartBundle:List:create.html.twig', array('form' => $form->createView()));
    }

    public function addItemAction(Request $request)
    {

        $form = $this->createForm(AddToListType::class);    //could be created as a service

        $form->handleRequest($request);

        $id = null;
        $list = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $id = $form->getData()['product_id'];
            $list = $form->getData()['list'];
        }
        else{
            $response = new Response('Bad request', Response::HTTP_BAD_REQUEST);    //just dummy response for this demo
            $response->send();
        }



        $item = $this->get("demo_cart.shopping_item_manager")->findById($id);
        $orderItem = $this->get("demo_cart.list_manager")->addShoppingItem($item, $list);

        if(!$orderItem){
            return $this->redirectToRoute("demo_cart_homepage", array(
                'error' => 'Error: failed to add the item'
            ));
        }

        return $this->redirectToRoute("demo_cart_list_view",array(
            'id' => $list->getId()
        ));
    }

    public function emptyAction(Request $request)
    {
        $form = $this->createForm(EmptyCartType::class);    //could be created as a service

        $form->handleRequest($request);

        $listId = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $listId = $form->getData()['cart_id'];
        }
        else{
            $response = new Response('Bad request', Response::HTTP_BAD_REQUEST);    //just dummy response for this demo
            $response->send();
        }

        $this->get("demo_cart.list_manager")->emptyCart($listId);


        return $this->redirectToRoute("demo_cart_list_view",array(
            'id' => $listId
        ));
    }

    public function removeItemAction(Request $request)
    {

        $form = $this->createForm(RemoveFromCartType::class);    //could be created as a service

        $form->handleRequest($request);

        $id = null;
        $listId = null;
        if ($form->isSubmitted() && $form->isValid()) {

            $id = $form->getData()['order_item_id'];
            $listId = $form->getData()['cart_id'];
        }
        else{
            $response = new Response('Bad request', Response::HTTP_BAD_REQUEST);    //just dummy response for this demo
            $response->send();
        }

        $orderItem = $this->get("demo_cart.order_item_manager")->findById($id);
        $removed = $this->get("demo_cart.list_manager")->removeItem($orderItem, $listId);

        if(!$removed){
            return $this->redirectToRoute("demo_cart_cart_view", array(
                'error' => 'Error: failed to remove item'
            ));
        }

        return $this->redirectToRoute("demo_cart_list_view",array(
            'id' => $listId
        ));
    }

    public function listAction(){

        $lists = $this->get("demo_cart.list_manager")->getUserLists();

        foreach($lists as $list){

            $removeForm = $this->createForm(RemoveCartType::class, null, array(
                'action' => $this->generateUrl('demo_cart_list_remove'),
                'method' => 'POST',
            ));

            $list->removeForm = $removeForm->createView();
        }

        return $this->render('DemoCartBundle:List:list.html.twig', array(
            'lists' => $lists,
        ));

    }
}