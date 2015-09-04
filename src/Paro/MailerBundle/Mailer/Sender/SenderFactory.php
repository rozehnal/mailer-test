<?php


namespace Paro\MailerBundle\Mailer\Sender;


use Paro\MailerBundle\Mailer\Exception\SenderNotFoundException;
use Paro\MailerBundle\Mailer\Sender\Swift\SwiftSender;

class SenderFactory implements SenderFactoryInterface
{

    /**
     * @var string
     */
    private $defaultEngine;

    public function __construct($defaultEngine)
    {

        $this->defaultEngine = $defaultEngine;
    }

    /**
     * @var array
     */
    private $engines = array();

    public function addEngine($name, $service)
    {
        $this->engines[$name] = $service;
    }


    /**
     * @param null $type
     * @return SwiftSender
     * @throws SenderNotFoundException
     */
    public function getMailer($type = null)
    {
        if (is_null($type)) {
            $type = $this->defaultEngine;
        }

        switch($type){
            case 'swiftmailer':
                return new SwiftSender($this->engines['swiftmailer']);
            default:
                throw new SenderNotFoundException(sprintf('Engine %s has not been found.', $type));
        }
    }
}