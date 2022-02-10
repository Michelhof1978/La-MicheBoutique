<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart {

    private $session;

    public function __construct(SessionInterface $session) //dés que ma classe sera appelé, la fonction constructeur sera initialisé
    {                          //injection de dépendance de SessionInterface ds la variable $session
        $this->session=$session;
    }

    public function add($id){
       
       $cart = $this->session->get('cart',[]);//chercher la session cart et tu me renvois un tableau

       if (!empty($cart[$id])){//si tu as bien un produit ds mon panier, incrémente X fois le nombre d'articles
           $cart[$id]++;

       } else {
           $cart[$id] = 1;//prends mon car ID et tu mets 1
       }
       
        $this->session->set('cart',$cart);
    }


public function get()
{
    return $this->session->get('cart');
}

public function remove()
{
    return $this->session->remove('cart');
}

}