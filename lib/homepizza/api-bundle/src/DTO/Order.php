<?php

namespace Homepizza\ApiBundle\DTO;


class Order
{
    /* @var array $menu - Состав заказа */
    private $menu;

    /* @var array $payment - Информация о расчете */
    private $payment = [
        'type' => null,
        'bonuses' => null,
        'details' => null
    ];

    /* @var bool $deferred - Отложенный заказ? */
    private $deferred;

    /* @var bool $confirmed - Подтвержденный заказ? */
    private $confirmed;

    /* @var int $kits - Выбрано наборов для роллов */
    private $kits;

    /* @var string $promocode - Примененный промокод */
    private $promocode;

    /* @var string $comment - Комментарий кухне */
    private $comment;

    /**
     * Проверка заполненных полей для запроса
     */
    public function checkFields()
    {
        // TODO
        // TODO в том чилсе, корректность меню
        // TODO в том числе, наличие информации в онлайн-платеже (?)
    }

    /**
     * @return array
     */
    public function getMenu(): array
    {
        return $this->menu;
    }

    /**
     * @param array $menu
     * @return Order
     */
    public function setMenu(array $menu): Order
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * @return array
     */
    public function getPayment(): array
    {
        return $this->payment;
    }

    /**
     * @param string $type
     * @return Order
     */
    public function setPaymentType(string $type): Order
    {
        $this->payment['type'] = $type;

        return $this;
    }

    /**
     * @param int $bonuses
     * @return Order
     */
    public function setPaymentBonuses(int $bonuses): Order
    {
        $this->payment['bonuses'] = $bonuses;

        return $this;
    }

    /**
     * @param array $paymentsDetails
     * @return Order
     */
    public function setPaymentOnlineInfo(array $paymentsDetails): Order
    {
        $this->payment['details'] = $paymentsDetails;

        return $this;
    }
}
