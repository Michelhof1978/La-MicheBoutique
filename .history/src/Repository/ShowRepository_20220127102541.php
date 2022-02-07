

public function findBySomeField(string $category, string $brand, string $description): ?array
    {
        $query = $this->createQueryBuilder('a');

        if ($category != null) {
            $query->andWhere('a.category = :category')
            ->setParameter('category', $category);
        }
        if ($brand != null) {
            $query->andWhere('a.brand = :brand')
            ->setParameter('brand', $brand);
        }
        if ($description != null) {
            $query->andWhere('a.description = :description')
              ->setParameter('description', $description);
        }
        $query->orderBy('a.id', 'ASC');
        return $query->getQuery()->getResult();
    }