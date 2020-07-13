<?php

namespace Homepizza\ApiBundle\Service;

use Homepizza\ApiBundle\DTO\Responses\AddressResponse;
use Homepizza\ApiBundle\DTO\Responses\BonusesResponse;
use Homepizza\ApiBundle\DTO\Responses\CustomerResponse;
use Homepizza\ApiBundle\DTO\Responses\KitsResponse;
use Homepizza\ApiBundle\DTO\Responses\OrderResponse;
use Homepizza\ApiBundle\DTO\Responses\TimeLimitResponse;
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
     * @throws \Exception
     */
    public function transformResponse($object, array $data)
    {
        if ($object instanceof CustomerResponse) $object = $this->toProfile($object, $data);
        if ($object instanceof AddressResponse) $object = $this->toAddresses($object, $data);
        if ($object instanceof BonusesResponse) $object = $this->toBonuses($object, $data);
        if ($object instanceof TimeResponse) $object = $this->toTime($object, $data);
        if ($object instanceof OrderResponse) $object = $this->toOrder($object, $data);
        if ($object instanceof KitsResponse) $object = $this->toKits($object, $data);

        return $object;
    }

    /**
     * Данные клиента
     *
     * @param CustomerResponse $object
     * @param array $data
     * @return CustomerResponse
     * @throws \Exception
     */
    private function toProfile(CustomerResponse $object, array $data)
    {
        // Преобразуем адреса клиента
        $data['addresses'] = $this->toAddresses(new AddressResponse(), $data);

        // Преобразуем профиль с данными клиента
        $object
            ->setName($data['name'])
            ->setPhone($data['phone'])
            ->setEmail($data['email'])
            ->setBonuses($data['bonuses'])
            ->setAddresses($data['addresses'])
            ->setPromo($data['promo'])
        ;

        return $object;
    }

    /**
     * Адреса клиента
     *
     * @param AddressResponse $object
     * @param array $data
     * @return array
     * @throws \Exception
     */
    private function toAddresses(AddressResponse $object, array $data)
    {
        $addresses = [];
        foreach ($data['addresses'] as $rawAddress) {
            if (!empty($addresses)) $object = new AddressResponse();
            $object
                ->setAddress($rawAddress['address'])
                ->setFias($rawAddress['street_fias_id'] ?? '')
                ->setHouse($rawAddress['house'])
                ->setRoom($rawAddress['room'] ?? '')
                ->setGateway($rawAddress['gateway'] ?? '')
                ->setLevel((int)$rawAddress['level'] ?? '')
                ->setMinsum((int)$rawAddress['minsum'] ?? 0)
            ;
            $addresses[] = $object;
        }

        return $addresses;
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
        return $object->setBalance($data['balance'] ?? 0);
    }

    private function toKits(KitsResponse $object, array $data)
    {
        $object
            ->setKits($data['kits'])
            ->setShowMoneyKits($data['additional_allow'])
            ->setPriceKits($data['additional_price'] ?? 0)
        ;

        return $object;
    }

    /**
     * Доступное время
     *
     * @param TimeResponse $object
     * @param array $data
     * @return TimeResponse | TimeLimitResponse
     */
    private function toTime(TimeResponse $object, array $data)
    {
        if ($data['result']) {
            $object
                ->setTime($data['datetime_current'])
                ->setAllow($data['datetime_want_allow'] ?? $data['result'])
                ->setVariants($data['datetime_want_variants'] ?? [])
                ->setSegment($data['region'] ?? '')
                ->setFreeKits($data['kits'])
                ->setBonuses([
                    'allowToPay' => $data['allow_bonus_to_pay'],
                    'willBeAdded' => $data['how_count_bonus_add'],
                    'willBeForDelivery' => $data['how_count_bonus_add_delivery_y'],
                    'willBeForTakeAway' => $data['how_count_bonus_add_delivery_n']
                ])
                ->setPrice($data['price'])
                ->setPayback($data['payback'])
                ->setActiveLocations($data['active_locations'] ?? []);
        }
        else {
            $object = new TimeLimitResponse();
            $object
                ->setMessage($data['result_comment'])
                ->setTime($data['datetime_current'])
                ->setFreeKits($data['kits'])
                ->setSegment($data['region'])
            ;
        }
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
        $object
            ->setOrderId($data['id'] ?? 0)
            ->setResult($data['result'])
            ->setMessage($data['message'] ?? '')
            ->setSegment($data['region'] ?? '')
            ->setTime([
                'current' => $data['datetime_current'],
                'wantAllow' => $data['datetime_want_allow'] ?? false,
                'variants' => $data['datetime_want_variants'] ?? []
            ])
        ;
        return $object;
    }
}
