<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/27/2016
 * Time: 8:09 AM
 */

namespace Demo\CartBundle\Controller;


use Demo\CartBundle\Entity\OrderElement\DetailedWishItemInterface;
use Demo\CartBundle\Form\Type\OrderItemType;
use Demo\CartBundle\Form\Type\WishOrderItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrderItemController extends Controller
{
    public function updateAction(Request $request, $id)
    {

        $om = $this->get("demo_cart.order_item_manager");

        $orderItem = $om->findById($id);

        if(!$orderItem)
        {
            throw $this->createNotFoundException('The order item is not found');
        }

        if($orderItem instanceof DetailedWishItemInterface) {
            $formType = WishOrderItemType::class;
        }
        else{
            $formType = OrderItemType::class;
        }

        $form = $this->createForm($formType, $orderItem);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $orderItem = $om->update($orderItem);

            return $this->redirectToRoute("demo_cart_orderitem_view", array("id"=>$orderItem->getId()));
        }

        return $this->render('DemoCartBundle:OrderItem:create.html.twig', array('form' => $form->createView()));
    }

    public function viewAction($id)
    {
        $om = $this->get("demo_cart.order_item_manager");

        $orderItem = $om->findById($id);

        return $this->render('DemoCartBundle:OrderItem:view.html.twig', array('item' => $orderItem));
    }
}