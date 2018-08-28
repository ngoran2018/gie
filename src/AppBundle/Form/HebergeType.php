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
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class HebergeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('libheberge', TextType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Libellé Hébergement',
              'autocomplete'=>'off'

            )
          ))
        ->add('abrevheberge', TextType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Abréviation Hébergement',
              'autocomplete'=>'off'

            )
          ))
          ->add('mtcoutheberge', IntegerType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Coût Hébergement',
              'autocomplete'=>'off'
  
            )
          ))
          ->add('mtcautionheberge', IntegerType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Caution Hébergement',
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
            'data_class' => 'AppBundle\Entity\Heberge'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_heberge';
    }


}
