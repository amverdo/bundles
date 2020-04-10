<?php


namespace Homepizza\ApiBundle\DTO;


class Customer
{
    /* @var string $name - Имя клиента (*) */
    private $name;

    /* @var string $phone - Телефон клиента (*) */
    private $phone;

    /* @var string $email - Почтовый адрес клиента */
    private $email;

    /* @var array $address - Адрес доставки (address*) */
    private $address = [
        'address' => null,
        'gateway' => null,
        'level' => null,
        'room' => null
    ];

    /**
     * Проверка заполненных полей
     */
    public function checkFields()
    {
        $success = isset($this->name) && isset($this->phone) && isset($this->address['address']);
        if (!$success) throw new \Exception('Не заполнены необходимые поля');
        if (preg_match("/^[0-9]{10,10}+$/", trim($this->phone)) && (int)substr(trim($this->phone), 0, 1) === 9) {
        }
        else {
            throw new \Exception('Телефон должен начинаться с 9-ки! Без лишних символов и пробелов.');
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Customer
     */
    public function setName(string $name): Customer
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Customer
     */
    public function setPhone(string $phone): Customer
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail(string $email): Customer
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return array
     */
    public function getAddressInfo(): array
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Customer
     */
    public function setAddress(string $address): Customer
    {
        $this->address['address'] = $address;

        return $this;
    }

    /**
     * @param string $gateway
     * @return Customer
     */
    public function setAddressGateway(string $gateway): Customer
    {
        $this->address['gateway'] = $gateway;

        return $this;
    }

    /**
     * @param int $level
     * @return Customer
     */
    public function setAddressLevel(int $level): Customer
    {
        $this->address['level'] = $level;

        return $this;
    }

    /**
     * @param string $room
     * @return Customer
     */
    public function setAddressRoom(string $room): Customer
    {
        $this->address['room'] = $room;

        return $this;
    }
}
