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
            'method' =>//je veux scanner mon Url 
        ]);
    }
}