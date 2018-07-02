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

class EcueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

      $this->ue = $options['ue'];
      $ue = $this->ue;

        $builder
        ->add('libecue', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Libellé Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('abrevecue', TextType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Abréviation Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('creditecue', null,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'Crédit Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('ctt', IntegerType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'CTT Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('cours', IntegerType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'COURS Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('tp', IntegerType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'TP Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('tpe', IntegerType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'TPE Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('autre', null,array(
          'attr'=> array(
            'class'=> 'form-control',
            'placeholder'=>'AUTRE Ecue',
            'autocomplete'=>'off'

          )
        ))
        ->add('ue',EntityType::class,array(
          'attr'=> array(
            'class'=> 'form-control',
          ),
          'class'=> 'AppBundle:Ue',
          'query_builder' => function(EntityRepository $er) use($ue){
              return $er-> RechercheUe($ue);
            },
            'choice_label' => 'libue'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ecue',
            'ue'=> null

        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ecue';
    }


}
