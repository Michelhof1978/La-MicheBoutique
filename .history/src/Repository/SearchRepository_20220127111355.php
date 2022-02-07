<?php

namespace App\Repository;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SearchRepository extends ServiceEntityRepository

  /**
    //  * @return Recherche[] Returns an array of Advert objects
    //  */

public function findBySomeField(string $category, string $product): ?array
    {
        $query = $this->createQueryBuilder('a');

        if ($category != null) {
            $query->andWhere('a.category = :category')
            ->setParameter('category', $category);
        }
        if ($products != null) {
            $query->andWhere('a.product = :product')
            ->setParameter('product', $product);
        }
        
        $query->orderBy('a.id', 'ASC');
        return $query->getQuery()->getResult();
    }