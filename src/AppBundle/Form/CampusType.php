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

class CampusType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('libcampus', TextType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Libellé Campus',
              'autocomplete'=>'off'

            )
          ))
        ->add('abrevcampus', TextType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Abréviation Campus',
              'autocomplete'=>'off'

            )
          ))
        ->add('seuilcampus', IntegerType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Seuil Campus',
              'autocomplete'=>'off'
  
            )
          ))
        ->add('heberge', null, array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Sélectionner un hébergement'
            )
          ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Campus'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_campus';
    }


}
