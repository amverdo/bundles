<?php

namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

/**
 * Ответ на запрос вермени
 */
class TimeResponse extends AbstractDTO
{
    /* @var string $time - Текущее доступное время */
    protected $time;

    /* @var bool $allow - Доступно для оформления? */
    protected $allow;

    /* @var array $variants - Варианты доступного времени */
    protected $variants;

    /* @var string $segment - Район/Сегмент доставки */
    protected $segment;

    /* @var int $freeKits - Кол-во доступных наборов */
    protected $freeKits;

    /* @var array $bonuses - Информация о бонусах */
    protected $bonuses = [
        'allowToPay' => 0,
        'willBeAdded' => 0,
        'willBeForDelivery' => 0,
        'willBeForTakeAway' => 0
    ];

    /* @var array $activeLocations - Активные филиалы, в случае самовывоза */
    protected $activeLocations;

    /* @var int $price - Цена переданного меню с учетом вычетов */
    protected $price;

    /* @var array $payback - Варианты сдачи, в зависимости от суммы переданного меню */
    protected $payback = [];

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
     * @return TimeResponse
     */
    public function setBonuses(array $bonuses): TimeResponse
    {
        $this->bonuses = $bonuses;

        return $this;
    }

    /**
     * @return array
     */
    public function getActiveLocations(): array
    {
        return $this->activeLocations;
    }

    /**
     * @param array $activeLocations
     * @return TimeResponse
     */
    public function setActiveLocations(array $activeLocations): TimeResponse
    {
        $this->activeLocations = $activeLocations;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return TimeResponse
     */
    public function setPrice(int $price): TimeResponse
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return array
     */
    public function getPayback(): array
    {
        return $this->payback;
    }

    /**
     * @param array $payback
     * @return TimeResponse
     */
    public function setPayback(array $payback): TimeResponse
    {
        $this->payback = $payback;

        return $this;
    }
}
