<?php

namespace Paro\MailerBundle;

use Paro\MailerBundle\DependencyInjection\TemplateEngineFactoryCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class ParoMailerBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TemplateEngineFactoryCompilerPass());
    }

}