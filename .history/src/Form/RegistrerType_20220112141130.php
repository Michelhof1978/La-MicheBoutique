<?php

namespace App\Form;

use App\Entity\User;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName', TextType::class, ['label' => 'Votre Prénom', 'attr' => ['placeholder'=>'Prénom']])//choisir ce qui s'affiche quand on tape textType (use Symfony\Component\Form\Extension\Core\Type\TextType;))
            ->add('lastName', TextType::class, ['label' => 'Votre Nomom', 'attr' => ['placeholder'=>'Nom']])
            ->add('email')
            ->add('password', TextType::class, ['label' => 'Votre Mot De Passe', 'attr' => ['placeholder'=>'Prénom']])
            
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
