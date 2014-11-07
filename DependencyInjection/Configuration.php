<?php

namespace J3tel\QueryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        
        $treeBuilder
            ->root('j3tel_core')
            ->children()
                ->arrayNode('controller')
                    ->children()
                        ->scalarNode('exception_handler')->end()
                        ->scalarNode('logger_channel')->end()
                    ->end()
                ->end()
                ->arrayNode('event')
                    ->children()
                        ->scalarNode('prefix')->end()
                    ->end()
                ->end()
                ->arrayNode('cache')
                    ->children()
                        ->integerNode('lifetime')->defaultValue(3600)->end()
                    ->end()
                ->end()
            ->end()
        ;
                
        return $treeBuilder;
    }
}
