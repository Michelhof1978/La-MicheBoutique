<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
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
        $user = $
        $form = $this->createForm(ChangePasswordType::class, $user)
        return $this->render('account/password.html.twig', [
         
        ]);
    }
}
