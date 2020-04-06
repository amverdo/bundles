<?php

namespace Homepizza\ApiBundle;

use Homepizza\ApiBundle\ApiManagerInterface;

class ApiManager implements ApiManagerInterface
{
    public function getSomething(): array
    {
        return [1, 2, 3];
    }
}