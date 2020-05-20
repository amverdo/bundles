<?php

namespace Homepizza\ApiBundle;

use Homepizza\ApiBundle\DTO\Customer;
use Homepizza\ApiBundle\DTO\Delivery;
use Homepizza\ApiBundle\DTO\Order;
use Homepizza\ApiBundle\DTO\Responses\AddressResponse;
use Homepizza\ApiBundle\DTO\Responses\BonusesResponse;
use Homepizza\ApiBundle\DTO\Responses\CustomerResponse;
use Homepizza\ApiBundle\DTO\Responses\KitsResponse;
use Homepizza\ApiBundle\DTO\Responses\OrderResponse;
use Homepizza\ApiBundle\DTO\Responses\TimeLimitResponse;
use Homepizza\ApiBundle\DTO\Responses\TimeResponse;

interface ApiManagerInterface
{
    /**
     * Очитска кэша по ключам бандла
     */
    public function resetKeys(): void;

    /**
     * Добавление уникального ключа в кэше
     * @param string $key
     */
    public function addKey(string $key): void;

    /**
     * Данные клиента
     *
     * @param string $phone
     * @return CustomerResponse
     */
    public function customerProfile(string $phone): CustomerResponse;

    /**
     * Адреса клиента
     *
     * @param string $phone
     * @return array
     */
    public function customerAddresses(string $phone): array;

    /**
     * Бонусный баланс клиента
     *
     * @param string $phone
     * @return BonusesResponse
     */
    public function customerBonuses(string $phone): BonusesResponse;

    /**
     * Запрос проверки времени
     *
     * @param Customer $customer
     * @param Delivery $delivery
     * @param Order $order
     * @return TimeResponse | TimeLimitResponse
     */
    public function checkTime(Customer $customer, Delivery $delivery, Order $order);

    /**
     * Создание заказа
     *
     * @param Customer $customer
     * @param Delivery $delivery
     * @param Order $order
     * @return OrderResponse
     */
    public function createOrder(Customer $customer, Delivery $delivery, Order $order): OrderResponse;


    /**
     * Проверка доступных наборов
     *
     * @param Order $order
     * @return KitsResponse
     */
    public function checkFreeKits(Order $order): KitsResponse;
}
