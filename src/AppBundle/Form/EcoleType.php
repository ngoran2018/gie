<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EcoleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libecole', TextType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Libellé Ecole',
                'autocomplete'=>'off'

              )
            ))
            ->add('abrevecole', TextType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Abréviation Ecole',
                'autocomplete'=>'off'

              )
            ))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ecole'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ecole';
    }


}
