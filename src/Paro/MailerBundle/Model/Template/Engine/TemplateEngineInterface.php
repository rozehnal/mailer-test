<?php

namespace Paro\MailerBundle\Model\Template\Engine;

interface TemplateEngineInterface
{
    public function getName();
    public function newTemplate();
}