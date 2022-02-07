<?php

namespace App\Controller;

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
            $produit = $_POST['products'];
            
            $search = $advertRepository->findBySomeField($category, $brand, $description);
            $ad = $userRepository->findOneBySomeField($postalCode);
        }
        return $this->render('home/show.html.twig', [
            'adverts' => $adverts
        ]);
    }

}