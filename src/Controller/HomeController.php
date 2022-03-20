<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Article;
use App\Repository\EventRepository;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $event   = $this->entityManager->getRepository(Event::class)->findByIsBest(1);
        $article = $this->entityManager->getRepository(Article::class)->findByIsBest(1);

        return $this->render('home/index.html.twig', [
            'event'     => $event,
            'article'   => $article   
        ]);
    }
}
