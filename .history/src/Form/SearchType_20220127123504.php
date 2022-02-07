<?php

namespace App\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Test\FormBuilderInterface;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Category', ChoiceType::class, [
                'choices'=> [
                 array_combine()   
                ]
            ]
                
            
            
           
            
                
           
            ->add('submit', SubmitType::class,[
                'label' => "Rechercher"])//création du bouton submit
            ;
    }
}