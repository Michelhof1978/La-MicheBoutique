<?php

namespace App\Form;

use App\Entity\User;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegistrerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName', TextType::class, [
                'constraints'=> new Length(2,30),//mn et max de caractères
                'label' => 'Votre Prénom', 
                'attr' => ['placeholder'=>'Prénom']])//choisir ce qui s'affiche quand on tape textType (use Symfony\Component\Form\Extension\Core\Type\TextType;))
            
            ->add('lastName', TextType::class, [
                'constraints'=> new Length(2,30),//mn et max de caractères
                'label' => 'Votre Nom', 
                'attr' => ['placeholder'=>'Nom']])
           
            ->add('email', EmailType::class, [
                'constraints'=> new Length(2,30),//mn et max de caractères
                'label' => 'Votre Email',
                'attr' => ['placeholder'=>'Email']])//emailType à choisir pour obliger à l'utilisateur de mettre un @
          
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques',
                'required' => true,//ce champs est requie, j'ai besoins de le rendre obligatoire
                'label' => 'Votre Mot De Passe',
                'first_options' => ['label'=>'Mot de Passe'],
                'second_options' => ['label'=>'Resaisir Mot de Passe'],
                //passwordType, permet de mettre des petits points ds le champs au lieu de voir les caractères
//RepeatedType: permets  de demander à symfony que ,j'ai besoin pour une même propriété, 2  champs différents (mot de passe et retaper mot de passe et qui doivent avoir exactement tous les 2 le même contenu)
           

            ])
           
                /* ->add('password_confirm', PasswordType::class, [
                    'label' => 'Reconfirmez Votre Mot De Passe', 
                    'mapped' => false,//Pour ne pas être lié à l'entity
                    'attr' => ['placeholder'=>'Mot De Passe']
                     ])   */
           
            ->add('submit', SubmitType::class,[
                'label' => "S'inscrire"])//création du bouton submit
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
