<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonneeController extends AbstractController
{
    /**
     * @Route("/abonnee", name="abonnee")
     */
    public function index(): Response
    {
        return $this->render('abonnee/index.html.twig', [
            'controller_name' => 'AbonneeController',
        ]);
    }
}
