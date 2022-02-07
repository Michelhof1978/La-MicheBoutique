<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart {

    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session=$session;
    }

    public function add($id){
       
       $cart = $this->session->get('cart',[]);

       if (!empty($cart))
       
        $this->session->set('cart', [
            [
'id' => $id,
'quantity' =>  1      ]

        ]);
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