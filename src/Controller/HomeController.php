<?php

namespace App\Controller;

use Homepizza\ApiBundle\DTO\Customer;
use Homepizza\ApiBundle\DTO\Delivery;
use Homepizza\ApiBundle\DTO\Order;
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
        $customer = new Customer();
        $delivery = new Delivery();
        $order = new Order();

        $customer
            ->setName('Иван Оформитель')
            ->setPhone('9222323221')
            ->setAddress("г Екатеринбург, ул Родонитовая, д 1")
        ;

        $delivery
            ->setTakeAway(false)
            ->setLocation("ул. 8 Марта 187")
            ->setCurrentTime(false)
            ->setDatetimeWant("2020-07-09 18:40:00")
        ;

        $order->setMenu([
            [
                "id" => "38b3eff8baf56627478ec76a704e9b52",
                "quantity" => 2
            ]
        ]);

        try {
            $result = $this->homepizza
                ->checkTime($customer, $delivery, $order)
            ;

            $result = $result->toArray();
        }
        catch (\Throwable $e) {
            $result = ['message' => $e->getMessage()];
            $code = 500;
        }

        return $this->json($result, 200);
    }
}
