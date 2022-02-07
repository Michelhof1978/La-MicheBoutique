<?php

public function findBySomeField(string $categories, string $products): ?array
    {
        $query = $this->createQueryBuilder('a');

        if ($categories != null) {
            $query->andWhere('a.category = :category')
            ->setParameter('category', $category);
        }
        if ($products != null) {
            $query->andWhere('a.brand = :brand')
            ->setParameter('brand', $brand);
        }
        
        $query->orderBy('a.id', 'ASC');
        return $query->getQuery()->getResult();
    }