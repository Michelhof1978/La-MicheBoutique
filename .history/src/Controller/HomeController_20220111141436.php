<?php

namespace App\Controller;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): 
    {
        return $this->render('home/index.html.twig');
    }
}
