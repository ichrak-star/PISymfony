<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrganisateurController extends AbstractController
{
    /**
     * @Route("/organisateur", name="organisateur")
     */
    public function index(): Response
    {
        return $this->render('organisateur/index.html.twig', [
            'controller_name' => 'OrganisateurController',
        ]);
    }
}
