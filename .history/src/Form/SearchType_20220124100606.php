<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add ('string', TextType::class, [// recherche en string de mes utilisatuers ds la barre de recherche
                'label'  => false,
                'required' => false, //false car on peut chercher soit même les catégories
                'attr' => [
                    'placeholder' => 'Votre recherche...'
                ]

                ])
                ->add('categories', EntityType::class,[
                 'label' => false,   
                 'required'  => false,
                 'category' => Category::class,
                 'multiple' => true,//plusieurs choix de selection
                 'expanded' => true,// selectionner plusieurs valeurs
                ]);

                ->add ('submit', SubmitType::class, [
                  'label'  
                ])
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