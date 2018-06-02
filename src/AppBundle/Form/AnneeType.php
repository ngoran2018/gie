<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AnneeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('debutannee', IntegerType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Début année',
            'autocomplete'=>'off'

          )
        ))

          ->add('libsessionexam', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Libellé session examen',
            'autocomplete'=>'off'

          )
        ))

        ->add('datecomexam', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Date commission',
            'autocomplete'=>'off'

          )
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Annee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_annee';
    }


}
