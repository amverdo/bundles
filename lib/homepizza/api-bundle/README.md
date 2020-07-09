# ApiBundle

Symfony bundle для работы с api программы (homepizza)

## Устновка ##

Добавляем в composer.json
```json
    "repositories": [
        {
            "type": "vcs",
            "url": "http://192.168.1.224/amv/api-bundle.git"
        }
    ],
    "config": {
        "secure-http": false
    },
```

Устанавливаем бандл
```shell
    composer require homepizza/api-bundle
```

Добавляем config/packages/homepizza_api.yaml entrypoint link

```yaml
    homepizza_api:
      link: 'http://homepizza.web/api.php'
```


## Использование ##

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Homepizza\ApiBundle\ApiManager;
use Homepizza\ApiBundle\DTO\Customer;
use Homepizza\ApiBundle\DTO\Delivery;
use Homepizza\ApiBundle\DTO\Order;

class HomeController extends AbstractController
{
    /* @var ApiManager */
    private $homepizza;

    public function __construct(ApiManager $homepizza)
    {
        $this->homepizza = $homepizza;
    }

    public function demo()
    {
        $result = $this->homepizza->customerProfile('9120511868');
        $this->json($result, 200);
    }

    public function time()
    {
        $customer = new Customer();
        $delivery = new Delivery();
        $order = new Order();

        $customer
            ->setName('Алескандр')
            ->setPhone('91205115454')
            ->setEmail('is.malozemov@ya.ru')
            ->setAddress('г Екатеринбург, ул Родонитовая, д 1')
        ;

        $delivery
            ->setTakeAway(false)
            ->setCurrentTime(false)
            ->setDatetimeWant('2020-04-14 13:25:00')
        ;

        $order
            ->setMenu([
                [
                    'id' => '7cbbc409ec990f19c78c75bd1e06f215',
                    'quantity' => 5
                ]
            ])
        ;
        $result = $this->homepizza->checkTime($customer, $delivery, $order);
        
        // Сброисить кэш бандла
        $this->homepizza->resetKeys();

        return $this->json($result, 200);
    }
}
```
