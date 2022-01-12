<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
class RegistrerController extends AbstractController
{
   
    /**
     * @Route("/inscription", name="registrer")
     */
    public function index(): Response
    {
        $user = new User();
        $f
        return $this->render('registrer/index.html.twig');
    }
}
