<?php

namespace App\Controller;

use App\Entity\Donation;
use App\Form\DonationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DonationController extends AbstractController
{
    #[Route('/donation', name: 'app_donation')]
    public function index(Request $request): Response
    {
        

        return $this->render('donation/index.html.twig', [

        ]);
    }


    #[Route('/donation', name: 'app_donation')]
    public function free(Request $request, ): Response
    {
        $donation = new Donation;
        $form = $this->createForm(DonationType::class, $donation);
        $form->handleRequest($request);
        if( $form->isValid() && $form->isSubmitted()){
            $form->getData();
        }

        return $this->render('donation/index.html.twig', [
            'form' => $form->createView(),
            
        ]);
    }
}
