<?php

namespace Paro\MailerBundle\Mailer\Template;

use Paro\MailerBundle\Mailer\Exception\TemplateEngineNotFoundException;

class TemplateFactory
{
    /**
     * @var array
     */
    private $engines = array();

    public function addEngine($name, $service)
    {
        $this->engines[$name] = $service;
    }

    public function newTemplate($name)
    {
        if (!array_key_exists($name, $this->engines)) {
            throw new TemplateEngineNotFoundException(sprintf('Template %s engine not found', $name));
        }
        return $this->engines[$name]->newTemplate();
    }
}