<?php

namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

class TimeLimitResponse extends AbstractDTO
{
    /* @var string $message - Сообщение о недоступности меню */
    protected $message;

    /* @var string $time - Ближайшее доступное время */
    protected $time;

    /* @var int $freeKits - Кол-во доступных бесплатных наборов  */
    protected $freeKits;

    /* @var string $segment - Сегмент доставки, раньше район, сейчас почему-то филиал */
    protected $segment;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return TimeLimitResponse
     */
    public function setMessage(string $message): TimeLimitResponse
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return TimeLimitResponse
     */
    public function setTime(string $time): TimeLimitResponse
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return int
     */
    public function getFreeKits(): int
    {
        return $this->freeKits;
    }

    /**
     * @param int $freeKits
     * @return TimeLimitResponse
     */
    public function setFreeKits(int $freeKits): TimeLimitResponse
    {
        $this->freeKits = $freeKits;

        return $this;
    }

    /**
     * @return string
     */
    public function getSegment(): string
    {
        return $this->segment;
    }

    /**
     * @param string $segment
     * @return TimeLimitResponse
     */
    public function setSegment(string $segment): TimeLimitResponse
    {
        $this->segment = $segment;

        return $this;
    }
}
