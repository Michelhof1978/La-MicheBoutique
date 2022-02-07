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
            $brand = $_POST['brands'];
            $description = $_POST['mot-cles'];
            $postalCode = $_POST['region'];
            $adverts = $advertRepository->findBySomeField($category, $brand, $description);
            $adverts = $userRepository->findOneBySomeField($postalCode);
        }
        return $this->render('home/show.html.twig', [
            'adverts' => $adverts
        ]);
    }

}