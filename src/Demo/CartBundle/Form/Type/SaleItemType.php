<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 4/23/2016
 * Time: 10:04 PM
 */

namespace Demo\CartBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\FormBuilderInterface;

class SaleItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('SaleItem', BaseShoppingItemType::class, array(
                'data_class' => 'Demo\CartBundle\Entity\SaleItem'
            ))
            ->add('discount', PercentType::class, array(
                'type' => 'integer'
            ))
        ;
    }
}