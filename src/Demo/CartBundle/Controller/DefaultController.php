<?php

namespace Demo\CartBundle\Controller;

use Demo\CartBundle\Entity\Product\ShoppingItem;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        //Setup for testing purpose, create cart if not found and deal as if it is the user cart
        $cm = $this->get("demo_cart.cart_manager");
        if(!($cm->getUserCart())){
            $cm->create();
        }

        return $this->render('DemoCartBundle:Default:index.html.twig');
    }
}
