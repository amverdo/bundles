<?php

namespace Homepizza\ApiBundle\Service;

use Homepizza\ApiBundle\DTO\Responses\AddressResponse;
use Homepizza\ApiBundle\DTO\Responses\BonusesResponse;
use Homepizza\ApiBundle\DTO\Responses\CustomerResponse;
use Homepizza\ApiBundle\DTO\Responses\OrderResponse;
use Homepizza\ApiBundle\DTO\Responses\TimeResponse;

/**
 * Трансформирование ответов в объекты и объектов в запросы (с проверкой)
 */
class ApiTransformer
{
    /**
     * Наполнение объекта
     *
     * @param $object
     * @param array $data
     * @return mixed
     */
    public function transformResponse($object, array $data)
    {
        if ($object instanceof CustomerResponse) $object = $this->toProfile($object, $data);
        if ($object instanceof AddressResponse) $object = $this->toAddresses($object, $data);
        if ($object instanceof BonusesResponse) $object = $this->toBonuses($object, $data);
        if ($object instanceof TimeResponse) $object = $this->toTime($object, $data);
        if ($object instanceof OrderResponse) $object = $this->toOrder($object, $data);

        return $object;
    }

    /**
     * Данные клиента
     *
     * @param CustomerResponse $object
     * @param array $data
     * @return CustomerResponse
     */
    private function toProfile(CustomerResponse $object, array $data)
    {
        return $object;
    }

    /**
     * Адреса клиента
     *
     * @param AddressResponse $object
     * @param array $data
     * @return array
     */
    private function toAddresses(AddressResponse $object, array $data)
    {
        return [];
    }

    /**
     * Бонусный баланс клиента
     *
     * @param BonusesResponse $object
     * @param array $data
     * @return BonusesResponse
     */
    private function toBonuses(BonusesResponse $object, array $data)
    {
        return $object;
    }

    /**
     * Доступное время
     *
     * @param TimeResponse $object
     * @param array $data
     * @return TimeResponse
     */
    private function toTime(TimeResponse $object, array $data)
    {
        return $object;
    }

    /**
     * Результат создания заказа
     *
     * @param OrderResponse $object
     * @param array $data
     * @return OrderResponse
     */
    private function toOrder(OrderResponse $object, array $data)
    {
        return $object;
    }
}
