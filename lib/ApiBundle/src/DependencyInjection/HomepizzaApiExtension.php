<?php

namespace Homepizza\ApiBundle\DependencyInjection;

use Symfony\Bundle\FrameworkBundle\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class HomepizzaApiExtension extends Extension
{
    /**
     * Инициализация контейнера, назначение аргументов
     *
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        var_dump(123);
        die();
    }
}
