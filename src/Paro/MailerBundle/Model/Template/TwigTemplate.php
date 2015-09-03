<?php

namespace Paro\MailerBundle\Model\Template;

use Paro\MailerBundle\Model\MessageInterface;
use Paro\MailerBundle\Model\TemplateInterface;

class TwigTemplate implements TemplateInterface, \Serializable
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    private $plainTemplate = null;
    private $htmlTemplate = null;

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct($twig)
    {

        $this->twig = $twig;
    }

    /**
     * @param $plainTemplate
     * @return $this
     */
    public function setPlaintextTemplate($plainTemplate)
    {
        $this->plainTemplate = $plainTemplate;
        return $this;
    }

    public function setHtmlTemplate($htmlTemplate)
    {
        $this->htmlTemplate = $htmlTemplate;
        return $this;
    }

    public function updateMessage(MessageInterface $message, array $params)
    {
        if (!is_null($this->htmlTemplate)) {
            $message->setHtmlContent($this->twig->render($this->htmlTemplate, $params));
        }
        if (!is_null($this->plainTemplate)) {
            $message->setPlainContent($this->twig->render($this->plainTemplate, $params));
        }
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return array($this->plainTemplate, $this->htmlTemplate);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {

    }
}