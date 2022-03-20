<?php

namespace App\Controller;

use App\Repository\MissionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MissionController extends AbstractController
{
    #[Route('/nos-mission', name: 'app_mission')]
    public function index(MissionRepository $missionRepository): Response
    {
        $mission = $missionRepository->findAll();
        return $this->render('mission/index.html.twig', [
            'mission' => $mission,

        ]);
    }

    #[Route('/mission/{slug}', name: 'app_mission_detail')]
    public function detail(MissionRepository $missionRepository, int $slug): Response
    {
        return $this->render('mission/detail.html.twig', [
            'mission' => $missionRepository->find($slug),
            
        ]);
    }
}
