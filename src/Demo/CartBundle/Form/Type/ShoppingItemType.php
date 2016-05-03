<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/23/2016
 * Time: 10:04 PM
 */

namespace Demo\CartBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ShoppingItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ShoppingItem', BaseShoppingItemType::class, array(
                'data_class' => 'Demo\CartBundle\Entity\Product\ShoppingItem'
            ))
        ;
    }
}