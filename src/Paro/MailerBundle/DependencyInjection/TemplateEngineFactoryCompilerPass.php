<?php


namespace Paro\MailerBundle\DependencyInjection;


use Paro\MailerBundle\Mailer\Template\Twig\TwigTemplateEngine;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class TemplateEngineFactoryCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {



        $this->configureTemplateFactory('paromailer.template.factory', $container);
        $this->configureSenderFactory('paromailer.sender.factory', $container);
    }

    public function configureTemplateFactory($name, ContainerBuilder $container)
    {
        if (!$container->has($name)) {
            return;
        }

        $definition = $container->findDefinition($name);


        if (class_exists('\Twig_Environment')) {
            $container
                ->register('paromailer.template.engine.twig', 'Paro\MailerBundle\Mailer\Template\Twig\TwigTemplateEngine')
                ->addArgument(new Reference('twig'));

            $definition->addMethodCall(
                'addEngine',
                array('twig', new Reference('paromailer.template.engine.twig'))
            );
        }

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


    public function configureSenderFactory($name, ContainerBuilder $container)
    {
        if (!$container->has($name)) {
            return;
        }

        $definition = $container->findDefinition($name);

        if (class_exists('\Swift_Mailer')) {
            $definition->addMethodCall(
                'addEngine',
                array('swiftmailer', new Reference('mailer'))
            );
        }

    }
}