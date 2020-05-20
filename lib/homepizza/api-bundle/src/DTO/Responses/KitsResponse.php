<?php

namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

class KitsResponse extends AbstractDTO
{
    /* @var int $kits - Количество бесплатных наборов */
    protected $kits;

    /* @var bool $showMoneyKits - Показывать платные наборы */
    protected $showMoneyKits;

    /* @var int $priceKits - Цена каждого платного набора */
    protected $priceKits;

    /**
     * @return int
     */
    public function getKits(): int
    {
        return $this->kits;
    }

    /**
     * @param int $kits
     * @return KitsResponse
     */
    public function setKits(int $kits): KitsResponse
    {
        $this->kits = $kits;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowMoneyKits(): bool
    {
        return $this->showMoneyKits;
    }

    /**
     * @param bool $showMoneyKits
     * @return KitsResponse
     */
    public function setShowMoneyKits(bool $showMoneyKits): KitsResponse
    {
        $this->showMoneyKits = $showMoneyKits;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriceKits(): int
    {
        return $this->priceKits;
    }

    /**
     * @param int $priceKits
     * @return KitsResponse
     */
    public function setPriceKits(int $priceKits): KitsResponse
    {
        $this->priceKits = $priceKits;
        return $this;
    }
}
