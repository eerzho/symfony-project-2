<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    #[Route('/front', name: 'app_front_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('front/index.html.twig');
    }

    #[Route('/video-list', name: 'app_front_videolist', methods: ['GET'])]
    public function videoList(): Response
    {
        return $this->render('front/videolist.html.twig');
    }

    #[Route('/video-details/{id}', name: 'app_front_videodetails', methods: ['GET'])]
    public function videoDetails(int $id): Response
    {
        return $this->render('front/video_details.html.twig', [
            'id' => $id
        ]);
    }

    #[Route('/search-result', name: 'app_front_searchresult', methods: ['POST'])]
    public function searchResult(): Response
    {
        return $this->render('front/search_results.html.twig');
    }

    #[Route('/pricing', name: 'app_front_pricing')]
    public function pricing(): Response
    {
        return $this->render('front/pricing.html.twig');
    }

    #[Route('/register', name: 'app_front_register')]
    public function register(): Response
    {
        return $this->render('front/register.html.twig');
    }

    #[Route('/login', name: 'app_front_login')]
    public function login(): Response
    {
        return $this->render('front/login.html.twig');
    }

    #[Route('/payment', name: 'app_front_payment')]
    public function payment(): Response
    {
        return $this->render('front/payment.html.twig');
    }
}
