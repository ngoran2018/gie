<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ParcoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('libparcours', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Abréviation',
            'autocomplete'=>'off'

          ))

        )
        ->add('abrevparcours', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Abréviation',
            'autocomplete'=>'off'

          )
        ))
        ->add('mention',  null, array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Sélectionner un domaine'
          )
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Parcours'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_parcours';
    }


}
