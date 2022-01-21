<?php

namespace App\Form

use Symfony\Component\Form\AbstractType;

class SearchType extends AbstractType
{
    public function configureOptions(OptionsResolve $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}