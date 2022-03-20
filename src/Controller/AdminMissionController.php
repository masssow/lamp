<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Form\MissionType;
use App\Repository\MissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/mission')]
class AdminMissionController extends AbstractController
{
    #[Route('/', name: 'app_admin_mission_index', methods: ['GET'])]
    public function index(MissionRepository $missionRepository): Response
    {
        return $this->render('admin_mission/index.html.twig', [
            'missions' => $missionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_mission_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MissionRepository $missionRepository): Response
    {
        $mission = new Mission();
        $form = $this->createForm(MissionType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $missionRepository->add($mission);
            return $this->redirectToRoute('app_admin_mission_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_mission/new.html.twig', [
            'mission' => $mission,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_mission_show', methods: ['GET'])]
    public function show(Mission $mission): Response
    {
        return $this->render('admin_mission/show.html.twig', [
            'mission' => $mission,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_mission_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Mission $mission, MissionRepository $missionRepository): Response
    {
        $form = $this->createForm(MissionType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $missionRepository->add($mission);
            return $this->redirectToRoute('app_admin_mission_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_mission/edit.html.twig', [
            'mission' => $mission,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_mission_delete', methods: ['POST'])]
    public function delete(Request $request, Mission $mission, MissionRepository $missionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mission->getId(), $request->request->get('_token'))) {
            $missionRepository->remove($mission);
        }

        return $this->redirectToRoute('app_admin_mission_index', [], Response::HTTP_SEE_OTHER);
    }
}
