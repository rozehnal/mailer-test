<?php


namespace Paro\MailerBundle\Model\Template;


use Symfony\Component\Config\Definition\Exception\Exception;

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
            throw new Exception('template engine not found');
        }
        return $this->engines[$name]->newTemplate();
    }
}