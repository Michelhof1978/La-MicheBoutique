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
    public function show(AdvertRepository $advertRepository, UserRepository $userRepository): Response
    {
        $search = [];
        if (!empty($_POST)) {
            $category = $_POST['categories'];
            $products = $_POST['products'];
            
            $search = $advertRepository->findBySomeField($category, $products);
            
        }
        return $this->render('home/show.html.twig', [
            'search' => $search
        ]);
    }

}