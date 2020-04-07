<?php

namespace Homepizza\ApiBundle;

use Homepizza\ApiBundle\ApiManagerInterface;
use Homepizza\ApiBundle\DTO\Customer;
use Homepizza\ApiBundle\DTO\Delivery;
use Homepizza\ApiBundle\DTO\Order;
use Homepizza\ApiBundle\DTO\Responses\AddressResponse;
use Homepizza\ApiBundle\DTO\Responses\BonusesResponse;
use Homepizza\ApiBundle\DTO\Responses\CustomerResponse;
use Homepizza\ApiBundle\DTO\Responses\OrderResponse;
use Homepizza\ApiBundle\DTO\Responses\TimeResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface AS HttpClient;
use Symfony\Component\Cache\Adapter\AdapterInterface AS Adapter;
use Symfony\Component\DependencyInjection\ContainerInterface AS Container;
use Homepizza\ApiBundle\Service\ApiTransformer;

class ApiManager implements ApiManagerInterface
{
    /* @var HttpClient */
    private $http;

    /* @var Adapter */
    private $cache;

    /* @var string */
    private $uri;

    /* @var ApiTransformer */
    private $transformer;

    public function __construct(HttpClient $http, Adapter $cache, ApiTransformer $transformer, Container $container)
    {
        $this->http = $http;
        $this->cache = $cache;
        $this->uri = $container->getParameter('homepizza.api_link');
        $this->transformer = $transformer;
    }

    public function customerProfile(string $phone): CustomerResponse
    {
        // TODO: Implement customerProfile() method.

        return $this->transformer->transformResponse(new CustomerResponse(), []);
    }

    public function customerAddresses(string $phone): array
    {
        // TODO: Implement customerAddresses() method.

        return $this->transformer->transformResponse(new AddressResponse(), []);
    }

    public function customerBonuses(string $phone): BonusesResponse
    {
        // TODO: Implement customerBonuses() method.

        return $this->transformer->transformResponse(new BonusesResponse(), []);
    }

    public function checkTime(Delivery $delivery, Order $order): TimeResponse
    {
        // TODO: Implement checkTime() method.

        return $this->transformer->transformResponse(new TimeResponse(), []);
    }

    public function createOrder(Customer $customer, Delivery $delivery, Order $order): OrderResponse
    {
        // TODO: Implement createOrder() method.

        return $this->transformer->transformResponse(new OrderResponse(), []);
    }
}
