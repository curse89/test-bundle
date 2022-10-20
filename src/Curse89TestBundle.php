<?php

namespace Curse89;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class Curse89TestBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->arrayNode('system')
                    ->children()
                        ->integerNode('system_id')->end()
                        ->scalarNode('system_secret')->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        // Contrary to the Extension class, the "$config" variable is already merged
        // and processed. You can use it directly to configure the service container.
        $container->services()
            ->get('curse89.test.client')
            ->arg(0, $config['system']['system_id'])
            ->arg(1, $config['system']['system_secret'])
        ;
    }
}