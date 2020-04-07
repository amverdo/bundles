<?php

namespace Homepizza\ApiBundle;

use Homepizza\ApiBundle\ApiManagerInterface;
use Homepizza\ApiBundle\DTO\Customer;
use Homepizza\ApiBundle\DTO\Delivery;
use Homepizza\ApiBundle\DTO\Order;
use Homepizza\ApiBundle\DTO\Responses\AddressesResponse;
use Homepizza\ApiBundle\DTO\Responses\BonusesResponse;
use Homepizza\ApiBundle\DTO\Responses\CustomerResponse;
use Homepizza\ApiBundle\DTO\Responses\OrderResponse;
use Homepizza\ApiBundle\DTO\Responses\TimeResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApiManager implements ApiManagerInterface
{
    /* @var HttpClientInterface */
    private $http;

    /* @var AdapterInterface */
    private $cache;

    /* @var string */
    private $uri;

    public function __construct(HttpClientInterface $http, AdapterInterface $cache, ContainerInterface $container)
    {
        $this->http = $http;
        $this->cache = $cache;
        $this->uri = $container->getParameter('homepizza.api_link');
    }

    public function customerProfile(string $phone): CustomerResponse
    {
        // TODO: Implement customerProfile() method.
    }

    public function customerAddresses(string $phone): AddressesResponse
    {
        // TODO: Implement customerAddresses() method.
    }

    public function customerBonuses(string $phone): BonusesResponse
    {
        // TODO: Implement customerBonuses() method.
    }

    public function checkTime(Delivery $delivery, Order $order): TimeResponse
    {
        // TODO: Implement checkTime() method.
    }

    public function createOrder(Customer $customer, Delivery $delivery, Order $order): OrderResponse
    {
        // TODO: Implement createOrder() method.
    }
}
