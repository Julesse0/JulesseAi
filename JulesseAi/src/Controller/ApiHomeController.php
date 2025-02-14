<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiHomeController extends AbstractController
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client,)
    {
        $this->client = $client;
    }

    #[Route('/api/home', name: 'api_home')]
    public function index(): Response
    {
        // Récupération des données via l'API
        $response = $this->client->request('GET', 'http://127.0.0.1:8000/api/data?page=1');
        $data = $response->toArray();
        $items = $data['member'];

        return $this->render('home/index.html.twig', [
            'data' => $items,      // Données récupérées via l'API
        ]);
    }
}
