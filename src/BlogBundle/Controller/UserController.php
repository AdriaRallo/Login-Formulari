<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\User;
use BlogBundle\Form\UserType;

class UserController extends Controller
{
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get("security.authentication_utils");
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		
                $user = new User();
		$form = $this->createForm(UserType::class,$user);
		
		$form->handleRequest($request);
                
                
		return $this->render("BlogBundle:User:login.html.twig", array(
			"error" => $error,
			"last_username" => $lastUsername,
                        "form" => $form->createView()
		)); 
    }
    
}   