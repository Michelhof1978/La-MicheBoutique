<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * requete qui me permet de recuperer les produits en fonction de l'utilisateur
     * @return Product[]
     */

    public function findWithSearch(Search $search) 
{
        $query = $this
            ->createQueryBuilder('p')// ('p)'= product
            ->select('c', 'p'); //je veux que tu selectione category et product
            ->join('p.category', 'c');  //je veux que tu fasse la jointure de mon produit Category et la table category
 
            if(!empty($search->categories))
            {
                $query = $query
                ->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $search->categories)
            }
            return $que//je demande à ma query de la créer et de me retourner les resultats
            }


    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
