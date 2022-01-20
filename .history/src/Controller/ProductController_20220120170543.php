<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManger)
    {
        $this->entityManager = $entityManger;
    }

    /**
     * @Route("/nos-produits", name="products")
     */
    public function index(): Response

    {
        
        return $this->render('product/index.html.twig', [
            'products' => $products //récupérer tous mes produits
            
        ]);
    }
}
