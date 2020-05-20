<?php

namespace Homepizza\ApiBundle\DTO;


class Order
{
    /* @var array $menu - Состав заказа (*) */
    private $menu;

    /* @var array $payment - Информация о расчете */
    private $payment = [
        'type' => null,
        'bonuses' => null,
        'details' => null,
        'orderId' => null,
        'orderNumber' => null
    ];

    /* @var int $payback - Сдача с купюры */
    private $payback = 0;

    /* @var bool $confirmed - Подтвержденный заказ? */
    private $confirmed;

    /* @var int $kits - Выбрано наборов для роллов */
    private $kits = 0;

    /* @var string $promocode - Примененный промокод */
    private $promocode = '';

    /* @var string $comment - Комментарий кухне */
    private $comment = '';

    /* @var array $utm - Метки для определения эффективных каналов привлечения */
    private $utm;

    /**
     * Проверка заполненных полей для запроса
     *
     * @param bool $beforeCreate
     * @throws \Exception
     */
    public function checkFields(bool $beforeCreate = false)
    {
        // Меню и его корректность
        if (!isset($this->menu)) throw new \Exception('Необходимо указать состав!');

        foreach ($this->menu as $key => $position) {
            if (!isset($position['id']) || !isset($position['quantity']))
                throw new \Exception('Корректная позиция содрежит id и quantity');
            if (gettype($position['id']) !== 'string' || gettype($position['quantity']) !== 'integer') {
                throw new \Exception('Неверные типы, id позиции - string, quantity - integer');
            }
            if (empty($position['id'])) throw new \Exception('Все id блюд должны быть указаны!');
            if ($position['quantity'] <= 0) throw new \Exception('Кол-во блюда не может быть равным 0');
        }

       if (!$beforeCreate) {
           // Наличие payment_type
           if (!isset($this->payment['type'])) throw new \Exception('Для оформления укажите тип оплаты');

           if (!in_array($this->payment['type'], ['cash', 'cashless', 'sberbank']))
               throw new \Exception('Указан неизвестный тип оплаты (cash, cashless, sberbank)');

           if ($this->payment['type'] === 'sberbank') {
               // Системный ID заказа в Сбербанке
               if (!isset($this->payment['orderId'])) throw new \Exception('Укажите orderId от Сбербанка!');

               // Номер заказа в Сбербанке
               if (!isset($this->payment['orderNumber']))
                   throw new \Exception('Укажите orderNumber от Сбербанка');
           }

           // Кол-во использованных бонусов
           if (!isset($this->payment['bonuses'])) throw new \Exception('Укажите использованные бонусы');

           // Наличие метки, о подтвержденности заказа
           if (!isset($this->confirmed)) throw new \Exception('Является ли заказ подтвержденным?');
       }
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
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->payment['type'];
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
     * @return null | int
     */
    public function getPaymentBonuses(): ?int
    {
        return $this->payment['bonuses'];
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
     * @return null|array
     */
    public function getPaymentDetails(): ?array
    {
        return $this->payment['details'];
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

    /**
     * @return null|string
     */
    public function getPaymentOrderId(): ?string
    {
        return $this->payment['orderId'];
    }

    /**
     * @param string $orderId
     * @return Order
     */
    public function setPaymentOrderId(string $orderId): Order
    {
        $this->payment['orderId'] = $orderId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPaymentOrderNumber(): ?string
    {
        return $this->payment['orderNumber'];
    }

    /**
     * @param string $orderNumber
     * @return Order
     */
    public function setPaymentOrderNumber(string $orderNumber): Order
    {
        $this->payment['orderNumber'] = $orderNumber;

        return $this;
    }

    /**
     * @return bool
     */
    public function isConfirmed(): bool
    {
        return $this->confirmed;
    }

    /**
     * @param bool $confirmed
     * @return Order
     */
    public function setConfirmed(bool $confirmed): Order
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * @return int
     */
    public function getKits(): int
    {
        return $this->kits;
    }

    /**
     * @param int $kits
     * @return Order
     */
    public function setKits(int $kits): Order
    {
        $this->kits = $kits;

        return $this;
    }

    /**
     * @return string
     */
    public function getPromocode(): string
    {
        return $this->promocode;
    }

    /**
     * @param string $promocode
     * @return Order
     */
    public function setPromocode(string $promocode): Order
    {
        $this->promocode = $promocode;

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
     * @return Order
     */
    public function setComment(string $comment): Order
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return null | array
     */
    public function getUtm(): ?array
    {
        return $this->utm;
    }

    /**
     * @param array $utm
     * @return Order
     */
    public function setUtm(array $utm): Order
    {
        $this->utm = $utm;

        return $this;
    }

    /**
     * @return int
     */
    public function getPayback(): int
    {
        return $this->payback;
    }

    /**
     * @param int $payback
     * @return Order
     */
    public function setPayback(int $payback): Order
    {
        $this->payback = $payback;

        return $this;
    }
}
