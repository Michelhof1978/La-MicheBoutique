<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterfac $entityManger)
    {
        $this->entityManager = $entityManger;
    }

    /**
     * @Route("/nos-produits", name="products")
     */
    public function index()

    {
        $products = $this->entityManager->getRepository(Product::class)->findAll();//aller tout recuperer mes articles

        return $this->render('product/index.html.twig', [
            'products' => $products //récupérer tous mes produits
            
        ]);
    }
}
