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


class MentionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $this->ecole = $options['ecole'];
      $ecole = $this->ecole;

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
            ->add('niveau', ChoiceType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
              ),
              'choices'=> array(
                'Sélectionnez un niveau'=> null,
                'Licence 1'=> 'Licence 1',
                'Licence 2'=> 'Licence 2',
                'Licence 3'=> 'Licence 3',
                'Master 1'=> 'Master 1',
                'Master 2'=> 'Master 2',
              )
            ))
            ->add('filiere', EntityType::class,array(
              'attr'=> array(
                'class'=> 'form-control',
              ),
              'class'=> 'AppBundle:Filiere',
              'query_builder' => function(EntityRepository $er) use($ecole){
                  return $er-> findFiliere($ecole);
                },
                'choice_label' => 'libfiliere'
            ))
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Mention',
            'ecole' => null,
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
