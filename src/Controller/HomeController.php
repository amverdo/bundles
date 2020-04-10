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
//         $this->homepizza->resetKeys();
        $customer = new Customer();
        $delivery = new Delivery();
        $order = new Order();

        $customer
            ->setName('Алескандр')
            ->setPhone('9120511868')
            ->setEmail('is.malozemov@ya.ru')
            ->setAddress('г. Екатеринбург, Индустрии д. 54')
        ;

        $delivery
            ->setTakeAway(false)
            ->setCurrentTime(false)
            ->setDatetimeWant('2020-04-20 18:40:00')
        ;

        $order
            ->setMenu([
                [
                    'id' => '123',
                    'quantity' => 1
                ]
            ])
            ->setPaymentType('sberbank')
            ->setPaymentOrderId('23')
            ->setPaymentOrderNumber('123')
            ->setPaymentBonuses(0)
            ->setConfirmed(true)
        ;

        $result = $this->homepizza->checkTime($customer, $delivery, $order);
        dump($result);
        die();
        return $this->json($result, 200);
    }
}
