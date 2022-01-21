<?php

namespace App\Form

use App\Classe\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' =>Search::class,
            'method' => 'GET',//je veux scanner mon Url pour que les utilisateurs puissent copier coller facilement l'Url et ainsi les partager
            'crsf_protection' => false, //pas besoins de sécurité donc on 
        ]);
    }
}