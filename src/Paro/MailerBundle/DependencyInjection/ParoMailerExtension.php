<?php

namespace Paro\MailerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ParoMailerExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array $config An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     *
     * @api
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $config);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('paro_mailer.sender', $config['sender']);
        $container->setParameter('paro_mailer.storage.type', $config['storage']['type']);
        $container->setParameter('paro_mailer.storage.parameters', $config['storage']['parameters']);

        if (isset($config['archiver'])) {
            $container->setParameter('paro_mailer.archiver.type', $config['archiver']['type']);
            $container->setParameter('paro_mailer.archiver.parameters', $config['archiver']['parameters']);
        }


    }
}