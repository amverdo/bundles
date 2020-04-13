<?php


namespace Homepizza\ApiBundle\DTO;


class Delivery
{
    /* @var bool $takeAway - Самовывоз */
    private $takeAway;

    /* @var string $location - Точка самовывоза */
    private $location;

    /* @var string $datetimeWant - Желаемое время доставки */
    private $datetimeWant;

    /* @var bool $currentTime - Доставка на текущее время? ( для deferred) */
    private $currentTime;

    /* @var bool $newAddress - Новый адрес */
    private $newAddress = false;

    /* @var array $dadataInformation - Информация от dadata для новых адресов */
    private $dadataInformation;

    /* @var string $comment - Комментарий к адресу доставки */
    private $comment;

    /**
     * Проверка заполненных полей
     *
     * @throws \Exception
     */
    public function checkFields()
    {
        if (!isset($this->takeAway)) throw new \Exception('Укажите, нужен ли самовывоз?');
        if ($this->takeAway) {
            if (!isset($this->location)) throw new \Exception('Необходимо указать точку самовывоза!');
        }
        if ($this->newAddress) {
            if (!isset($this->dadataInformation))
                throw new \Exception('Нужно указать fias для новых адресов');
        }
        if (!isset($this->currentTime)) throw new \Exception('Укажите, доставка на текущее время?');
        if (!$this->currentTime) {
            if (!isset($this->datetimeWant)) throw new \Exception('Укажите время для доставки.');
        }
    }

    /**
     * @return bool
     */
    public function isTakeAway(): bool
    {
        return $this->takeAway;
    }

    /**
     * @param bool $takeAway
     * @return Delivery
     */
    public function setTakeAway(bool $takeAway): Delivery
    {
        $this->takeAway = $takeAway;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): ?string
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
     * @return null | array
     */
    public function getDadataInformation(): ?array
    {
        return $this->dadataInformation;
    }

    /**
     * @param array $dadataInformation
     * @return Delivery
     */
    public function setDadataInformation(array $dadataInformation): Delivery
    {
        $this->dadataInformation = $dadataInformation;

        return $this;
    }

    /**
     * @return null | string
     */
    public function getComment(): ?string
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

    /**
     * @return bool
     */
    public function isCurrentTime(): bool
    {
        return $this->currentTime;
    }

    /**
     * @param bool $currentTime
     * @return Delivery
     */
    public function setCurrentTime(bool $currentTime): Delivery
    {
        $this->currentTime = $currentTime;

        return $this;
    }
}
