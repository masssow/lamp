<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuiSommesController extends AbstractController
{
    #[Route('/qui-sommes-nous', name: 'app_qui_sommes')]
    public function index(): Response
    {
        return $this->render('qui_sommes/index.html.twig', [
            'controller_name' => 'QuiSommesController',
        ]);
    }
}
