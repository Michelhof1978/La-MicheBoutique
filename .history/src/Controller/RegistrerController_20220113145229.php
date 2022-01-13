<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegistrerType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrerController extends AbstractController
{    
    private $entityManager;// faire appel à EntityManager pour envoyer info à la Bdd
    public function __construct (EntityManagerInterface $entityManager){
        $this->entityManager=$entityManager;
    }
   
    /**
     * @Route("/inscription", name="registrer")
     */
    public function index(Request $request, UserPasswordHasherInterface $encoder):response//use Symfony\Component\HttpFoundation\Request; 
    {
        $user = new User();//création de l'objet User
        $form = $this->createForm(RegistrerType::class, $user); //instancier le formulaire à l'aide de la méthode createForm()
        $form = $form->handleRequest($request);
        //a pris une photo des données et sont pour l'instant enregistrer en mémoire vive
        if ($form->isSubmitted() && $form->isValid()) { 
            
            $password=$encoder->hashPassword($user,$user->getPassword());
            $user->
            
            $this->entityManager->persist($user);// dites à Doctrine que vous souhaitez (éventuellement) enregistrer le produit (aucune requête pour le moment)
            $this->entityManager->flush();// exécute réellement les requêtes (c'est-à-dire la requête INSERT)
            
        }
         
           
        return $this->render('registrer/index.html.twig',[
            'form' => $form->createView() //créer la vue de mon formulaire
        ]);
    }
}
