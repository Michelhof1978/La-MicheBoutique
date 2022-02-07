<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
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
    public function index():Response

    {
        $products = $this->entityManager->getRepository(Product::class)->findAll(); //aller tout recuperer mes articles
        $form = $this->createForm(SearchType::);
        //dd($products);Quand on veut debbuger
        return $this->render('product/index.html.twig', [

            'products' => $products //récupérer tous mes produits

        ]);
    }


    //FAIRE APPEL A LA ROUTE EN LUI INDIQUANT DE FAIRE APPEL A SLUG QUE L ON A CREE DS LE EASYADMIN POUR UNE URL PLUS PROPRE

    /**
     * @Route("/produit/{slug}", name="product") 
     */
    public function show($slug):Response

    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBySlug($slug);

        if(!$product){
            return $this->redirectToRoute('products');
        }
         //si tu ne trouve pas le produit, redirige moi vers products 
        

        //dd($products);Pour debugger en tapant l'url https://localhost:8000/produit/monslug
        return $this->render('product/show.html.twig', [

            'product' => $product //récupérer le produit

        ]);
    }
}
