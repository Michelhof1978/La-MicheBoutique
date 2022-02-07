<?php

namespace App\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Test\FormBuilderInterface;


class SearchType extends AbstractType
{
    public function buildFor(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName', ChoiceType::class, [
                'constraints' => [new Length(['min' => 3,'max' => 30])],//mn et max de caractères ds le champs
                'label' => 'Votre Prénom', 
                'attr' => ['placeholder'=>'Prénom']])//choisir ce qui s'affiche quand on tape textType (use Symfony\Component\Form\Extension\Core\Type\TextType;))
            
            ->add('lastName', ChoiceType::class, [
                'constraints' => [new Length(['min' => 3,'max' => 30])],
                'label' => 'Votre Nom', 
                'attr' => ['placeholder'=>'Nom']])
           
            
                
           
            ->add('submit', SubmitType::class,[
                'label' => "Rechercher"])//création du bouton submit
            ;
    }
}