<?php


namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

class BonusesResponse extends AbstractDTO
{
    /**
     * Бонусный баланс
     *
     * @var int $balance
     */
    private $balance;

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance): BonusesResponse
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Проверка, что на балансе есть бонусы
     *
     * @return bool
     */
    public function positiveBalance(): bool
    {
        return $this->balance > 0;
    }

    public function toArray()
    {
        return ['balance' => $this->balance];
    }
}
