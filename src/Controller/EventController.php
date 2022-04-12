<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/evenements', name: 'app_events')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();

        return $this->render('evenements/index.html.twig', [
            'events' => $events
        ]);
    }

    #[Route('/evenement/{slug}', name: 'app_event_detail')]
    public function detail(EventRepository $eventRepository, int $slug): Response
    {

        return $this->render('evenements/detail.html.twig', [
            'event' => $eventRepository->find($slug)
        ]);
    }
}
