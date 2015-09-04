<?php

namespace Paro\MailerBundle\Model\Template\Twig;

use Paro\MailerBundle\Model\MessageInterface;
use Paro\MailerBundle\Model\Template\TemplateInterface;

class TwigTemplate implements TemplateInterface
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
}