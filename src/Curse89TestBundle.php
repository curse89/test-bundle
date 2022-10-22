<?php

namespace Curse89;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class Curse89TestBundle extends AbstractBundle
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
            ->set('curse89_test', AppBundle::class)
            ->autowire()
            ->alias(AppBundle::class, 'curse89_test');

        $container->services()
            ->get('curse89_test')
            ->arg('systemId', $config['system']['system_id'])
            ->arg('systemSecret', $config['system']['system_secret'])
        ;
    }
}