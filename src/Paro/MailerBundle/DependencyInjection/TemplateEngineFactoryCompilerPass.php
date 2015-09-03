<?php


namespace Paro\MailerBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class TemplateEngineFactoryCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {

        if (!$container->has('paromailer.template.factory')) {
            return;
        }

        $definition = $container->findDefinition(
            'paromailer.template.factory'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'paromailer.template.engine'
        );
        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall(
                    'addEngine',
                    array($attributes["alias"], new Reference($id))
                );
            }
        }
    }
}