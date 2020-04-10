<?php

namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

/**
 * Ответ на запрос вермени
 */
class TimeResponse extends AbstractDTO
{
    /* @var string $time - Текущее доступное время */
    private $time;

    /* @var bool $allow - Доступно для оформления? */
    private $allow;

    /* @var array $variants - Варианты доступного времени */
    private $variants;

    /* @var string $segment - Район/Сегмент доставки */
    private $segment;

    /* @var int $freeKits - Кол-во доступных наборов */
    private $freeKits;

    /* @var array $bonuses - Информация о бонусах */
    private $bonuses = [
        'allowToPay' => 0,
        'willBeAdded' => 0,
        'willBeForDelivery' => 0,
        'willBeForTakeAway' => 0
    ];

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return TimeResponse
     */
    public function setTime(string $time): TimeResponse
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAllow(): bool
    {
        return $this->allow;
    }

    /**
     * @param bool $allow
     * @return TimeResponse
     */
    public function setAllow(bool $allow): TimeResponse
    {
        $this->allow = $allow;

        return $this;
    }

    /**
     * @return array
     */
    public function getVariants(): array
    {
        return $this->variants;
    }

    /**
     * @param array $variants
     * @return TimeResponse
     */
    public function setVariants(array $variants): TimeResponse
    {
        $this->variants = $variants;

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
     * @return TimeResponse
     */
    public function setSegment(string $segment): TimeResponse
    {
        $this->segment = $segment;

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
     * @return TimeResponse
     */
    public function setFreeKits(int $freeKits): TimeResponse
    {
        $this->freeKits = $freeKits;

        return $this;
    }

    /**
     * @return int
     */
    public function getBonusesAllowToPay(): int
    {
        return $this->bonuses['allowToPay'];
    }

    /**
     * @return int
     */
    public function getBonusesWillBeAdded(): int
    {
        return $this->bonuses['willBeAdded'];
    }

    /**
     * @return int
     */
    public function getBonusesWillBeForDelivery(): int
    {
        return $this->bonuses['willBeForDelivery'];
    }

    /**
     * @return int
     */
    public function getBonusesWillBeForTakeAway(): int
    {
        return $this->bonuses['willBeForTakeAway'];
    }

    /**
     * @param array $bonuses
     */
    public function setBonuses(array $bonuses): void
    {
        $this->bonuses = $bonuses;
    }
}
