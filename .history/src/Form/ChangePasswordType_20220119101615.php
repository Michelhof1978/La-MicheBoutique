<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled' => true ,
                'label' => 'Mon adresse email'
            ])
            
            ->add('firstname', TextType::class,[
                'disabled' => true,
                'label' => 'Mon prénom'//Ne souhaite pas que l utilisateur puisse modifier le champs
            ])
            ->add('lastname', TextType::class,[
                'disabled' => true,
                'label' => 'Mon nom'
            ])
            ->add('password', PasswordType::class,[
                'label' => 'Mon mot de passe actuel',
                'attr' => [
                    'placeholder' =
                ]
            ])
            ;
           
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
