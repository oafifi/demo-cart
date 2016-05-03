<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 5/1/2016
 * Time: 6:03 AM
 */

namespace Demo\CartBundle\Form\Type;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddToListType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('list', EntityType::class, array(
                'class' => 'DemoCartBundle:Cart\WishList',
                'choices' => $options['lists'],
                'choice_label' => 'getName',
            ))
            ->add('product_id', HiddenType::class)
            ->add('add_to_list', SubmitType::class, array('label' => 'Add to List'))
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'lists' => null,
        ));
    }
}