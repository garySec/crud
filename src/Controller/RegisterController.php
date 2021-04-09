<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Login;
use App\Service\EncodeService;
use App\Form\RegisterType;
class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request, EncodeService $encode): Response
    {
    		$user = new Login();
    		$form = $this->createForm(RegisterType::class,$user);
    		$em = $this->getDoctrine()->getManager();

    		$form->handleRequest($request);

    		if ($form->isSubmitted() && $form->isValid()) {

                $user = $encode->Encode($user);
                $em->persist($user);
                $em->flush();

				return $this->redirect($this->generateUrl('app_login'));
		}

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}