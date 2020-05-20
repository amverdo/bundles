<?php


namespace Homepizza\ApiBundle\DTO\Responses;

use Homepizza\ApiBundle\DTO\AbstractDTO;

class CustomerResponse extends AbstractDTO
{
    /**
     * Имя клиента
     *
     * @var string $name
     */
    protected $name;

    /**
     * Телефон клиента
     *
     * @var string $phone
     */
    protected $phone;

    /**
     * Почтовый адрес клиента
     *
     * @var string $email
     */
    protected $email;

    /**
     * Бонусный баланс
     *
     * @var int $bonuses
     */
    protected $bonuses;

    /**
     * Адреса доставки клиента
     *
     * @var array $addresses
     */
    protected $addresses;

    /**
     * Глобальное промо - системное или персональное (скидка на самовывоз например)
     *
     * @var array $promo
     */
    protected $promo;

    /**
     * Новый клиент?
     *
     * @return bool
     */
    public function isNew(): bool
    {
        return empty($this->name) && !empty($this->phone);
    }

    /**
     * У клиента есть бонусы?
     *
     * @return bool
     */
    public function hasBonuses(): bool
    {
        return $this->bonuses > 0;
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
     * @return CustomerResponse
     */
    public function setName(string $name): CustomerResponse
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
     * @return CustomerResponse
     * @throws \Exception
     */
    public function setPhone(string $phone): CustomerResponse
    {
        if (empty($phone)) throw new \Exception('В ответе отсутсвует номер телефона!');
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
     * @return CustomerResponse
     */
    public function setEmail(string $email): CustomerResponse
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getBonuses(): int
    {
        return $this->bonuses;
    }

    /**
     * @param int $bonuses
     * @return CustomerResponse
     */
    public function setBonuses(int $bonuses): CustomerResponse
    {
        $this->bonuses = $bonuses;

        return $this;
    }

    /**
     * @return array
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param array $addresses
     * @return CustomerResponse
     */
    public function setAddresses(array $addresses): CustomerResponse
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * @return array
     */
    public function getPromo(): array
    {
        return $this->promo;
    }

    /**
     * @param array $promo
     * @return CustomerResponse
     */
    public function setPromo(array $promo): CustomerResponse
    {
        $this->promo = $promo;

        return $this;
    }
}
