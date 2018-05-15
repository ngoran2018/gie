<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FiliereType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libfiliere', TextType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Libellé Filière',
                'autocomplete'=>'off'

              )
            ))
            ->add('abrevfiliere', TextType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Abréviation Filière',
                'autocomplete'=>'off'

              )
            ))
            ->add('ecole', null, array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Sélectionner une Ecole'
              )
            ))
            ->add('domaine', null, array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Sélectionner un domaine'
              )
            ))
            ->add('tformation', null, array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Sélectionner un type de formation'
              )
            ))
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Filiere'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_filiere';
    }


}
