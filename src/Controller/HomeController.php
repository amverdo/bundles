<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Homepizza\ApiBundle\ApiManager;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class HomeController extends AbstractController
{
    private $homepizza;
    private $cache;

    public function __construct(ApiManager $homepizza, AdapterInterface $cache)
    {
        $this->cache = $cache;
        $this->homepizza = $homepizza;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/api-bundle", name="home_api_bundle")
     */
    public function apiAction(): JsonResponse
    {
        // $this->homepizza->resetKeys();
        $result = $this->homepizza->customerAddresses('9120511868');
        dump($result);
        die();
        return $this->json($result, 200);
    }
}
