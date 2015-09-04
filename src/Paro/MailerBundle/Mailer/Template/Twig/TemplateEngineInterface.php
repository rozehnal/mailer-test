<?php

namespace Paro\MailerBundle\Mailer\Template\Twig;

interface TemplateEngineInterface
{
    public function getName();
    public function newTemplate();
}