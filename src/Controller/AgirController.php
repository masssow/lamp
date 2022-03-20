<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgirController extends AbstractController
{
    #[Route('/agir-avec-nous', name: 'app_agir')]
    public function index(): Response
    {
        return $this->render('agir/index.html.twig', [
            'controller_name' => 'AgirController',
        ]);
    }
}
