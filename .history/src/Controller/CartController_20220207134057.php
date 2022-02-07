<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/mon-panier", name="cart")
     */
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [
            
        ]);
    }

    /**
     * @Route("/cart/add/", name="cart")
     */
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [
            
        ]);
    }
}
