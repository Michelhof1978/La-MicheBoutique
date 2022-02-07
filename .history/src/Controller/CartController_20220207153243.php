<?php

namespace App\Controller;

use App\Classe\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/mon-panier", name="cart")
     */
    public function index(Cart $cart): Response
    {
        dd($cart->get());
       
        return $this->render('cart/index.html.twig');
    }

    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function add(Cart $cart,$id): Response
    {
        $cart = $this->session->get('cart');
        $cart->add($id);
        return $this->redirectToRoute('cart');
    }
    /**
     * @Route("/cart/remove", name="remove_my_cart")
     */
    public function remove(Cart $cart): Response         //supprimer l'ensemble du papier 
    {
       
        $cart->remove();
        return $this->redirectToRoute('products');
    }
}
