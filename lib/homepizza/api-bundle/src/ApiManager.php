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

    public function __construct(
        HttpClientInterface $http,
        AdapterInterface $cache,
        string $uri = 'http://homepizza.web/v2.php'
    )
    {
        $this->http = $http;
        $this->cache = $cache;
        $this->uri = $uri;
    }

    public function getSomething(): array
    {
        $result = $this->http
            ->request('GET', $this->uri.'/api/data/division')
            ->getContent()
        ;

//        $this->cache->deleteItems([
//            sha1('test_key'),
//            sha1('test_key2'),
//            sha1('test_key3'),
//            sha1('test_key4')
//        ]);

        $item = $this->cache->getItem(sha1('test_key'));
        if (!$item->isHit()) {
            $data = '123123';
            $item->set($data);
            $this->cache->save($item);
            dump('Нет кэш API!');
//            die();
        }

        $item = $this->cache->getItem(sha1('test_key2'));
        if (!$item->isHit()) {
            $data = '123123';
            $item->set($data);
            $this->cache->save($item);
            dump('Нет кэш API 2!');
//            die();
        }

        $item = $this->cache->getItem(sha1('test_key3'));
        if (!$item->isHit()) {
            $data = '123123';
            $item->set($data);
            $this->cache->save($item);
            dump('Нет кэш API 3!');
//            die();
        }

        $item = $this->cache->getItem(sha1('test_key4'));
        if (!$item->isHit()) {
            $data = '123123';
            $item->set($data);
            $this->cache->save($item);
            dump('Нет кэш API 4!');
//            die();
        }

        return json_decode($result, true);
    }
}
