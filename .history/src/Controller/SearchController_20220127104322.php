<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/recherche", name="search")
     */
    public function show(ShowRepository* $showRepository, UserRepository $userRepository): Response
    {
        $search = [];
        if (!empty($_POST)) {
            $category = $_POST['categories'];
            $products = $_POST['products'];
            
            $search = $showRepository->findBySomeField($category, $products);
            
        }
        return $this->render('search/index.html.twig', [
            'search' => $search
        ]);
    }

}