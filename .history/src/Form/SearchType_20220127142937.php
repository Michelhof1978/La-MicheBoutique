<?php

namespace App\form;

use App\Classe\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface as FormFormBuilderInterface;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormFormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('string', TextType::class, [])
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' =>'GET',
            'crsf_protection' => false,
        
        ]);
    } 

    public function getBlockPrefix()
    {
        return '';
    }

    }
