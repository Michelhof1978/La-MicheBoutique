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
        $user = new User();//création de l'objet User
        $form = $this->createForm(re); //instancier le formulaire à l'aide de la méthode createForm()
        return $this->render('registrer/index.html.twig');
    }
}
