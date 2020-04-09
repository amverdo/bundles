<?php


namespace Homepizza\ApiBundle\DTO;


class Delivery
{
    /* @var bool $carryout - Самовывоз */
    private $carryout;

    /* @var string $location - Точка самовывоза */
    private $location;

    /* @var string $datetimeWant - Желаемое время доставки */
    private $datetimeWant;

    /* @var bool $newAddress - Новый адрес */
    private $newAddress;

    /* @var bool $dadataInformation - Информация от dadata для новых адресов */
    private $dadataInformation;

    /* @var string $comment - Комментарий к адресу доставки */
    private $comment;

    /**
     * Проверка заполненных полей
     *
     * @param bool $forTime
     */
    public function checkFields($forTime = true)
    {
        // TODO
    }

    /**
     * @return bool
     */
    public function isCarryout(): bool
    {
        return $this->carryout;
    }

    /**
     * @param bool $carryout
     * @return Delivery
     */
    public function setCarryout(bool $carryout): Delivery
    {
        $this->carryout = $carryout;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return Delivery
     */
    public function setLocation(string $location): Delivery
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getDatetimeWant(): string
    {
        return $this->datetimeWant;
    }

    /**
     * @param string $datetimeWant
     * @return Delivery
     */
    public function setDatetimeWant(string $datetimeWant): Delivery
    {
        $this->datetimeWant = $datetimeWant;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNewAddress(): bool
    {
        return $this->newAddress;
    }

    /**
     * @param bool $newAddress
     * @return Delivery
     */
    public function setNewAddress(bool $newAddress): Delivery
    {
        $this->newAddress = $newAddress;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDadataInformation(): bool
    {
        return $this->dadataInformation;
    }

    /**
     * @param bool $dadataInformation
     * @return Delivery
     */
    public function setDadataInformation(bool $dadataInformation): Delivery
    {
        $this->dadataInformation = $dadataInformation;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Delivery
     */
    public function setComment(string $comment): Delivery
    {
        $this->comment = $comment;

        return $this;
    }
}
