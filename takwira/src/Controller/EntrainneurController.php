<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrainneurController extends AbstractController
{
    /**
     * @Route("/entrainneur", name="entrainneur")
     */
    public function index(): Response
    {
        return $this->render('entrainneur/index.html.twig', [
            'controller_name' => 'EntrainneurController',
        ]);
    }
}
