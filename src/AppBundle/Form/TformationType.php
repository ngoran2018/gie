<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TformationType extends AbstractType
{
  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
      $builder
          ->add('libformation', TextType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Libellé Type Formation',
              'autocomplete'=>'off'

            )
          ))
          ->add('abrevformation', TextType::class,array(
            'attr'=> array(
              'class'=> 'form-control',
              'placeholder'=>'Abréviation Type Formation',
              'autocomplete'=>'off'

            )
          ))
      ;
  }


/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Tformation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tformation';
    }


}
