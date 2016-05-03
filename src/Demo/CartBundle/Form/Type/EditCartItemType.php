<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/29/2016
 * Time: 7:04 AM
 */

namespace Demo\CartBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class EditCartItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('order_item_id', HiddenType::class)
            ->add('_ref', HiddenType::class)
            ->add('edit_cart_item', SubmitType::class, array('label' => 'Edit'))
        ;
    }
}