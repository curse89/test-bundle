<?php

namespace Curse89\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class Curse89TestExtension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);
    }
}