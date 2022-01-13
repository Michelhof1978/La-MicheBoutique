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
    public function index(?User $user,Request $request, EntityManager $entityManager):response//use Symfony\Component\HttpFoundation\Request; // faire appel à EntityManager pour envoyer info à la Bdd
    {
        $user = new User();//création de l'objet User
        $form = $this->createForm(RegistrerType::class, $user); //instancier le formulaire à l'aide de la méthode createForm()
        $form = $form->handleRequest($request);
        //a pris une photo des données et sont pour l'instant enregistrer en mémoire vive
        if ($form->isSubmitted() && $form->isValid()) { 
            if(!$user->getId()){
                $entityManager->persist($user);
            }
            $entityManager->flush();
            return $this->redirect($this->generateUrl('user_edit', ['id' => $user->getId()]));
        }
         
           
        return $this->render('registrer/index.html.twig',[
            'form' => $form->createView() //créer la vue de mon formulaire
        ]);
    }
}
