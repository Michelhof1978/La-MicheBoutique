<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request)
    {
    
        $products = $this->entityManager->getRepository(Product::class)->findAll(); //aller tout recuperer mes articles

        $search = new Search();//barre de recherche
        $form = $this->createForm(SearchType::class,$search);//creation de la barre de recherche
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->getRepository(Product::class)->findWithSearch($search); //retourner simple le produit recherché
// comme findWithSearch n existe pas, il va falloir le créer manuellement ds 
            dd($search);
        }
         
        
    

        //dd($products);Quand on veut debbuger
        return $this -> render('product/index.html.twig', [

            'products' => $products, //récupérer tous mes produits
            'form' => $form -> createView(), //passer à la vue la barre de recherche
        ]);
    }


    //FAIRE APPEL A LA ROUTE EN LUI INDIQUANT DE FAIRE APPEL A SLUG QUE L ON A CREE DS LE EASYADMIN POUR UNE URL PLUS PROPRE

    /**
     * @Route("/produit/{slug}", name="product") 
     */
    public function show($slug)

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
