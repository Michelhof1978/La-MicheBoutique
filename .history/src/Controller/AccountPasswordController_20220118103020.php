<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountPasswordController extends AbstractController
{
    /**
     * @Route("/compte/modification mot de passe", name="account_password")
     */
    public function index(): Response
    {
        <form action=""></form>
        return $this->render('account/password.html.twig', [
         
        ]);
    }
}
