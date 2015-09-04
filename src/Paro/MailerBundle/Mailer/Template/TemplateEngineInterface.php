<?php

namespace Paro\MailerBundle\Mailer\Template;

interface TemplateEngineInterface
{
    public function getName();
    public function newTemplate();
}