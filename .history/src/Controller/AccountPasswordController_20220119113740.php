<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountPasswordController extends AbstractController
{
    private $entityManager;
    
    public function_construct(En)
    /**
     * @Route("/compte/modification-mot-de-passe", name="account_password")
     */
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface )
    {
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $old_pwd = $form->get('old_password')->getData();
            

            if ($userPasswordHasherInterface ->isPasswordValid($user, $old_pwd)) {
            $new_pwd = $form->get('new_password')->getData();//recupération du nouveau pwd
            $password = $userPasswordHasherInterface($user, $new_pwd);

            $user->setPassword($password);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            
            }
        }
            
        return $this->render('account/password.html.twig', [
         'form' => $form->createView(),
        ]);
    }


}
