<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResponsablePublicationController extends AbstractController
{
    /**
     * @Route("/responsable/publication", name="responsable_publication")
     */
    public function index(): Response
    {
        return $this->render('responsable_publication/index.html.twig', [
            'controller_name' => 'ResponsablePublicationController',
        ]);
    }
}
