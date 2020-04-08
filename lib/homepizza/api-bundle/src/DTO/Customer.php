<?php


namespace Homepizza\ApiBundle\DTO;


class Customer
{
    /* @var string $name - Имя клиента */
    private $name;

    /* @var string $phone - Телефон клиента */
    private $phone;

    /* @var string $email - Почтовый адрес клиента */
    private $email;

    /**
     * Проверка заполненных полей
     */
    public function checkFields()
    {
        // TODO
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
}
