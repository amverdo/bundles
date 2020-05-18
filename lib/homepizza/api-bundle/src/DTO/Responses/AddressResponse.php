<?php

namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

class AddressResponse extends AbstractDTO
{
    /**
     * Строка адреса
     *
     * @var string $address
     */
    protected $address;

    /**
     * FIAS ID улицы
     *
     * @var string $fias
     */
    protected $fias;

    /**
     * Номер дома
     *
     * @var string $house
     */
    protected $house;

    /**
     * Квартира или офис
     *
     * @var string $room
     */
    protected $room;

    /**
     * Подъезд
     *
     * @var string $gateway
     */
    protected $gateway;

    /**
     * Этаж
     *
     * @var int $level
     */
    protected $level;

    /**
     * Минимальная сумма доставки на район адреса
     *
     * @var int $minsum
     */
    protected $minsum;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return AddressResponse
     * @throws \Exception
     */
    public function setAddress(string $address): AddressResponse
    {
        if (empty($address)) throw new \Exception('Нет строки адреса!');
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getFias(): string
    {
        return $this->fias;
    }

    /**
     * @param string $fias
     * @return AddressResponse
     */
    public function setFias(string $fias): AddressResponse
    {
//        if (empty($fias)) throw new \Exception('Отсутствует fias улицы!');
        $this->fias = $fias;

        return $this;
    }

    /**
     * @return string
     */
    public function getHouse(): string
    {
        return $this->house;
    }

    /**
     * @param string $house
     * @return AddressResponse
     * @throws \Exception
     */
    public function setHouse(string $house): AddressResponse
    {
        if (empty($house)) throw new \Exception('Дом отсутсвует!');
        $this->house = $house;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $room
     * @return AddressResponse
     */
    public function setRoom(string $room): AddressResponse
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return string
     */
    public function getGateway(): string
    {
        return $this->gateway;
    }

    /**
     * @param string $gateway
     * @return AddressResponse
     */
    public function setGateway(string $gateway): AddressResponse
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @return null|int
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @param $level
     * @return AddressResponse
     */
    public function setLevel($level): AddressResponse
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinsum(): int
    {
        return $this->minsum;
    }

    /**
     * @param int $minsum
     * @return AddressResponse
     * @throws \Exception
     */
    public function setMinsum(int $minsum): AddressResponse
    {
        if (empty($minsum)) throw new \Exception('Минимальная сумма отсутсвует или должна быть минимум 1 рубль!');
        $this->minsum = $minsum;

        return $this;
    }
}
