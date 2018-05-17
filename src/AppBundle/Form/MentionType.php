<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MentionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libmention', TextType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Libellé Mention',
                'autocomplete'=>'off'

              )
            ))
            ->add('abrevmention', TextType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Abréviation',
                'autocomplete'=>'off'

              )
            ))
            ->add('niveau', TextType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
                'placeholder'=>'Niveau',
                'autocomplete'=>'off'

              )
            ))
            ->add('filiere', null,array(
              'attr'=> array(
                'class'=> 'form-control',    

              )
            ))
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Mention'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_mention';
    }


}
