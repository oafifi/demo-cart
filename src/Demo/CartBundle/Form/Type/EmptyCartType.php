<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/29/2016
 * Time: 9:26 AM
 */

namespace Demo\CartBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class EmptyCartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('cart_id', HiddenType::class)
        ->add('clear_cart', SubmitType::class, array('label' => 'Empty Cart'))
    ;
}
}