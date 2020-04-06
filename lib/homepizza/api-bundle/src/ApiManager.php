<?php

namespace Homepizza\ApiBundle;

use Homepizza\ApiBundle\ApiManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class ApiManager implements ApiManagerInterface
{
    /* @var HttpClientInterface */
    private $http;

    /* @var AdapterInterface */
    private $cache;

    /* @var string */
    private $uri;

    /* @var int */
    private $cacheLife;

    public function __construct(HttpClientInterface $http, AdapterInterface $cache)
    {
        $this->http = $http;
        $this->cache = $cache;
    }

    public function getSomething(): array
    {
        $result = $this->http
            ->request('GET', 'http://homepizza.web/v2.php/api/data/division')
            ->getContent()
        ;

        return json_decode($result, true);
    }
}