<?php

namespace Paro\MailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('paro_mailer');

        $rootNode
            ->children()
            ->scalarNode('sender')->defaultValue('swiftmailer')->end()
            ->arrayNode('storage')
                ->children()
                    ->arrayNode('parameters')
                        ->children()
                            ->scalarNode('folder')
                            ->end()
                        ->end()
                    ->end()
                    ->scalarNode('type')
                    ->end()
                ->end()
            ->end()
            ->arrayNode('archiver')
                ->children()
                    ->arrayNode('parameters')
                        ->children()
                            ->scalarNode('folder')
                            ->end()
                        ->end()
                    ->end()
                    ->scalarNode('type')
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}