<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart {

    private $session;

    public function __construct(SessionInterface $session) //dés que ma classe sera appelé, la fonction constructeur sera initialisé
    {                          //injection de dépendance
        $this->session=$session;
    }

    public function add($id){
       
       $cart = $this->session->get('cart',[]);

       if (!empty($cart[$id])){
           $cart[$id]++;

       } else {
           $cart[$id] = 1;
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