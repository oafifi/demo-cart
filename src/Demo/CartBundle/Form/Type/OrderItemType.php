<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/27/2016
 * Time: 12:56 PM
 */

namespace Demo\CartBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity', IntegerType::class)
            ->add('update', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Demo\CartBundle\Entity\OrderElement\OrderItem',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'order_item',
        ));
    }
}