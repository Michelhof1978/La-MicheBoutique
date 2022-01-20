<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField; //namepace de la classe correspondante
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
   
            public function configureFields(string $pageName): iterable //Afficher les inputs et ds quel format
            {
                return [
                    TextField::new('name'), //A recupérer ds Prouct
                    ImageField::new('illustration'),
                    TextField::new('subtitle'),
                    TextareaField::new('description'),
                    MoneyField::new('price'),
                    CollectionField::new('category'),
                ];
            }
        
    }
    

