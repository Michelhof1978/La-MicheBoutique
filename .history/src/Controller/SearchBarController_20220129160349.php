<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchBarController extends AbstractController
{
    /**
     * @Route("/search/bar", name="search_bar")
     */
    public function index(): Response
    {
        return $this->render('/index.html.twig', [
            'controller_name' => 'SearchBarController',
        ]);
    }
}
