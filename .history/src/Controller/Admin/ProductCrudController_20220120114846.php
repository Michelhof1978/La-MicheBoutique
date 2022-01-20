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
                    Field::new('name'),
                    Field::new('illustration'),
                    Field::new('sub'),
                    Field::new('stock'),
                    Field::new('publishedAt'),
                ];
            }
        ];
    }
    
}
