<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            public function configureFields(string $pageName): iterable
            {
                return [
                    TextField::new('name'),
                    ImageField::new('illustration'),
                    TextField::new('subtitle'),
                    TextareaField::new('description'),
                    ::new('price'),
                    Field::new('category'),
                ];
            }
        ];
    }
    
}
