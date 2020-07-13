<?php

namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

class OrderResponse extends AbstractDTO
{
    /* @var bool $result - Результат создания заказа */
    protected $result;

    /* @var int $orderId - id созданного заказа */
    protected $orderId = 0;

    /* @var string $message - Сообщение в ответ на создание заказа */
    protected $message;

    /* @var string $segment - вроде как сегмент, который район, но сейчас филиал :) */
    protected $segment;

    /* @var array $time - Параметры ответа времени на запрос создания заказа */
    protected $time = [
        'current' => null,
        'wantAllow' => null,
        'variants' => []
    ];

    /**
     * @return bool
     */
    public function isResult(): bool
    {
        return $this->result;
    }

    /**
     * @param bool $result
     * @return OrderResponse
     */
    public function setResult(bool $result): OrderResponse
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return null | string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return OrderResponse
     */
    public function setMessage(string $message): OrderResponse
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return null | string
     */
    public function getSegment(): ?string
    {
        return $this->segment;
    }

    /**
     * @param string $segment
     * @return OrderResponse
     */
    public function setSegment(string $segment): OrderResponse
    {
        $this->segment = $segment;

        return $this;
    }

    /**
     * @return array
     */
    public function getTime(): array
    {
        return $this->time;
    }

    /**
     * @param array $time
     * @return OrderResponse
     */
    public function setTime(array $time): OrderResponse
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeCurrent(): string
    {
        return $this->time['current'];
    }

    /**
     * @return bool
     */
    public function getTimeWantAllow(): bool
    {
        return $this->time['wantAllow'];
    }

    /**
     * @return array
     */
    public function getTimeVariants(): array
    {
        return $this->time['variants'];
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return OrderResponse
     */
    public function setOrderId(int $orderId): OrderResponse
    {
        $this->orderId = $orderId;

        return $this;
    }
}
