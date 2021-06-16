<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResponsableTicketController extends AbstractController
{
    /**
     * @Route("/responsable/ticket", name="responsable_ticket")
     */
    public function index(): Response
    {
        return $this->render('responsable_ticket/index.html.twig', [
            'controller_name' => 'ResponsableTicketController',
        ]);
    }
}
