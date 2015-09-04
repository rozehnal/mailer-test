<?php

namespace Paro\MailerBundle\Model\Template\Twig;

interface TemplateEngineInterface
{
    public function getName();
    public function newTemplate();
}