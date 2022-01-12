<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrerController extends AbstractController
{
    $user = new User
    /**
     * @Route("/inscription", name="registrer")
     */
    public function index(): Response
    {
        return $this->render('registrer/index.html.twig');
    }
}
