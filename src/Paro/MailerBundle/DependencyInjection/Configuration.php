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
            ->scalarNode('storage')->defaultValue('folder')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}