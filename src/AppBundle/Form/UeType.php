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

class UeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $this->ecole = $options['ecole'];
      $ecole = $this->ecole;

        $builder
        ->add('libue', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Libellé Ue',
            'autocomplete'=>'off'

          )
        ))
        ->add('abrevue', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Abréviation',
            'autocomplete'=>'off'

          )
        ))
        ->add('typeue', null, array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Sélectionner un type Ue'
          )
        ))
        ->add('semestre', null, array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Sélectionner un Semestre'
          )
        ))
        ->add('mention',EntityType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
          ),
          'class'=> 'AppBundle:Mention',
          'query_builder' => function(EntityRepository $er) use($ecole){
              return $er-> findMention($ecole);
            },
            'choice_label' => 'libmention'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ue',
            'ecole' => null,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ue';
    }


}
