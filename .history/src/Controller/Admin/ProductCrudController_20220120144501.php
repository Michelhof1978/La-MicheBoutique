<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField; //Renvoyez les objets de champ appropriés pour afficher chaque propriété
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
   
            public function configureFields(string $pageName): iterable //Renvoyez Fieldles objets créés pour les propriétés de l'entité Doctrine.
            // EasyAdmin transforme ces objets génériques Fielden objets spécifiques permettant d'afficher chaque type de propriété :
            {
                return [
                    TextField::new('name'), //A recupérer ds Product.php, 
                    SlugField::new('slug')->setTargetFieldName(''),
                    ImageField::new('Illustration')->setBasePath('uploads/'),
                    TextField::new('subtitle'),
                    TextareaField::new('Description'),
                    MoneyField::new('Price'),
                    AssociationField::new('Category'),
                ];
            }
        
    }
    

