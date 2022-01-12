<?php

namespace App\Form;

use App\Entity\User;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName', TextType::class, ['label' => 'Votre Prénom', 'attr' => ['placeholder'=>'Prénom']])//choisir ce qui s'affiche quand on tape textType (use Symfony\Component\Form\Extension\Core\Type\TextType;))
            ->add('lastName', TextType::class, ['label' => 'Votre Nom', 'attr' => ['placeholder'=>'Nom']])
            ->add('email', EmailType::class, ['label' => 'Votre Email', 'attr' => ['placeholder'=>'Email']])//emailType à choisir pour obliger à l'utilisateur de mettre un @
            ->add('password', PasswordType::class, ['label' => 'Votre Mot De Passe', 'attr' => ['placeholder'=>'Mot De Passe']])//passwordType, permet de mettre des petits points ds le champs au lieu de voir les caractères
            ->add('submit', SubmitType::class,[]
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
