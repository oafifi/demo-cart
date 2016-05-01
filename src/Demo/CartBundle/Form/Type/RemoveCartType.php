<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 5/1/2016
 * Time: 10:50 PM
 */

namespace Demo\CartBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class RemoveCartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cart_id', HiddenType::class)
            ->add('remove_from_cart', SubmitType::class, array('label' => 'Remove'))
        ;
    }
}