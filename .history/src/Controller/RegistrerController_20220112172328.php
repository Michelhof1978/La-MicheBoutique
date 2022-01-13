<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegistrerType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class RegistrerController extends AbstractController
{
   
    /**
     * @Route("/inscription", name="registrer")
     */
    public function index(Request $request, EntityManager $entityManager):response//use Symfony\Component\HttpFoundation\Request; // faire appel à EntityManager pour envoyer info à la Bdd
    {
        $user = new User();//création de l'objet User
        $form = $this->createForm(RegistrerType::class, $user); //instancier le formulaire à l'aide de la méthode createForm()
        $form = $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
         //$user=$form->getData();//demander à injecter les données du formulaire ds User   
            $entityManager->persist()
       
        }
      
        return $this->render('registrer/index.html.twig',[
            'form' => $form->createView() //créer la vue de mon formulaire
        ]);
    }
}
