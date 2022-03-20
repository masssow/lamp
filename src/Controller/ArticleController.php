<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'app_article')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->findAll();
        return $this->render('article/index.html.twig', [
            'article' => $article
        ]);
    }

    #[Route('/article/{slug}', name: 'app_article_detail')]
    public function detail(ArticleRepository $articleRepository, int $slug): Response
    {
  
        return $this->render('article/detail.html.twig', [
            'article' => $articleRepository->find($slug)
        ]);
    }
}
