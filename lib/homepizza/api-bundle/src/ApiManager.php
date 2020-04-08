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
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
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
        $result = $this->makeRequest(
            'profile_'.$phone,
            'GET',
            $this->uri . '/site/customer/'. $phone
        );

        return $this->transformer->transformResponse(new CustomerResponse(), $result);
    }

    public function customerAddresses(string $phone): array
    {
        $result = $this->makeRequest(
            'addresses_'.$phone,
            'POST',
            $this->uri . '/site/get_addresses_by_phone',
            [
                'body' => ['phone' => $phone]
            ]
        );

        return $this->transformer->transformResponse(new AddressResponse(), $result);
    }

    public function customerBonuses(string $phone): BonusesResponse
    {
        $result = $this->makeRequest(
            'bonuses_'.$phone,
            'POST',
            $this->uri . '/site/get_bonus_balance_by_phone',
            [
                'body' => ['phone' => $phone]
            ]
        );

        return $this->transformer->transformResponse(new BonusesResponse(), $result);
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

    public function makeRequest(string $key, string $method, string $uri, array $options = []): array
    {
        $item = $this->cache->getItem('apibundle_'.sha1($key));
        if (!$item->isHit()) {
            try {
                $result = $this->http
                    ->request($method, $uri, $options)
                    ->toArray();
            } catch (ClientExceptionInterface $e) {
                throw new \Exception('Некорректный запрос');
            } catch (DecodingExceptionInterface $e) {
                throw new \Exception('Некорректный ответ');
            } catch (RedirectionExceptionInterface $e) {
                throw new \Exception('Больше не обслуживается');
            } catch (ServerExceptionInterface $e) {
                throw new \Exception('Ошибка на сервере');
            } catch (TransportExceptionInterface $e) {
                throw new \Exception('Проблема с сетью');
            }
            $item->set($result);
            $this->cache->save($item);
            $this->addKey($item->getKey());
        }
        $result = $item->get();

        return $result;
    }

    public function resetKeys(): void
    {
        $item = $this->cache->getItem('apibundle_keys');
        if ($item->isHit()) $this->cache->deleteItems($item->get());
    }

    public function addKey(string $key): void
    {
        $item = $this->cache->getItem('apibundle_keys');
        $keys = !$item->isHit() ? [] : $item->get();
        $keys[] = $key;
        $item->set($keys);
        $this->cache->save($item);
    }
}
