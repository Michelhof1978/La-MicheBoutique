<?php

namespace App\Controller;

use App\Classe\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManger){

        $this->entityManager = $entityManger;
    }
    /**
     * @Route("/mon-panier", name="cart")
     * 
     */
    public function index(Cart $cart): Response
    {
        
        //dd($cart->get());
        $cartComplete = [];
        foreach ($cart->() as $id => $quantity) {
            $cartComplete[] = [
                'product' => $this
                'quantity' => $quantity

            ]

        }

        return $this->render('cart/index.html.twig',[
            'cart' => $cart->get()//passer en variable pour que twig puisse afficher
        ]);
        
    }


    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function add(Cart $cart,$id): Response //fonction qui me permets d ajouter des articles ds mon panier
    {
       
        $cart->add($id);//récupérer id de mon produit
        return $this->redirectToRoute('cart'); //dés que je choisi de mettre un article ds le papier, je souhaiterai être redirigé vers mon panier
    }

    
    /**
     * @Route("/cart/remove", name="remove_my_cart")
     */
    public function remove(Cart $cart): Response         //supprimer totalement l'ensemble de mon panier et retourner ds products
    {
       
        $cart->remove();
        return $this->redirectToRoute('products');
    }
}
