<?php

namespace Curse89\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('curse89_test');
        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('systems')
                    ->children()
                        ->integerNode('system_id')->end()
                        ->scalarNode('system_secret')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}