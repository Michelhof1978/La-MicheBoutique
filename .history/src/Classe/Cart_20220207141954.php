<?php

namespace App\Classe;

class Cart {

    private $session;
    public function __construct(SessionInterface $session)
    {
        $this->session=$session;
    }

    public function add($id){
        $this->session->set('cart', [
'id' => $id,
'quantity' =>  1      ]);
    }
}

public function get()
{
    return $this->session->get()
}