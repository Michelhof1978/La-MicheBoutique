<?php

namespace App\Form;

use App\Classe\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add ('string', TextType::class), [// recherche en string de mes utilisatuers ds la barre
                'label'  => 'Rechercher',
                'required' => false, //false car on peut chercher soit même les catégories
                'attr' => [
                    'placeholder' => 'Votre recherche...'
                ]

                ]
            }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' =>Search::class,
            'method' => 'GET',//je veux scanner mon Url pour que les utilisateurs puissent copier coller facilement l'Url et ainsi les partager
            'crsf_protection' => false, //pas besoins de sécurité donc on la désactive de symfony
        ]);
    }

    public function getBlockPrefix() //pour eviter de retourner un tableau qui va appeler la classe search donc, tu me retourne rien
    {
        return '';
    }
}