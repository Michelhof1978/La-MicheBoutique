<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            
            ->add('password', PasswordType::class,[
                'label' => 'Mon mot de passe actuel',
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre mot de passe actuel',
                
                ->add('new_password', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'mapped' => false,
                    'invalid_message' => 'Les mots de passe doivent être identiques',
                    'required' => true,//ce champs est requie, j'ai besoins de le rendre obligatoire
                    'label' => 'Votre nouveau Mot De Passe',

                    'first_options' => [
                    'label'=>'Nouveau Mot de Passe',
                    'attr' => ['placeholder'=>'Votre Mot de Passe'],
                    
                    'second_options' => ['label'=>'Confirmez Votre Nouveau Mot de Passe'],
                    'attr' => ['placeholder'=>'Confirmez Votre Nouveau Mot de Passe']
                ]
                ]
                
            }

                
                ->add('submit', SubmitType::class,[
                    'label' => "Envoyer"])//création du bouton submit
                   
                    //passwordType, permet de mettre des petits points ds le champs au lieu de voir les caractères
    //RepeatedType: permets  de demander à symfony que ,j'ai besoin pour une même propriété, 2  champs différents (mot de passe et retaper mot de passe et qui doivent avoir exactement tous les 2 le même contenu)
               
    
   
           
        
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
