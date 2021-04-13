<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChooseCrudController extends AbstractController
{
    /**
     * @Route("/chose", name="choose_crud")
     */
    public function index(): Response
    {	

        return $this->render('choose_crud/index.html.twig');
    }
}
