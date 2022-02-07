<?php

namespace App\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Test\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName', TextType::class, [
                'constraints' => [new Length(['min' => 3,'max' => 30])],//mn et max de caractères ds le champs
                'label' => 'Votre Prénom', 
                'attr' => ['placeholder'=>'Prénom']])//choisir ce qui s'affiche quand on tape textType (use Symfony\Component\Form\Extension\Core\Type\TextType;))
            
            ->add('lastName', TextType::class, [
                'constraints' => [new Length(['min' => 3,'max' => 30])],
                'label' => 'Votre Nom', 
                'attr' => ['placeholder'=>'Nom']])
           
            
                /* ->add('password_confirm', PasswordType::class, [
                    'label' => 'Reconfirmez Votre Mot De Passe', 
                    'mapped' => false,//Pour ne pas être lié à l'entity
                    'attr' => ['placeholder'=>'Mot De Passe']
                     ])   */
           
            ->add('submit', SubmitType::class,[
                'label' => "S'inscrire"])//création du bouton submit
            ;
    }