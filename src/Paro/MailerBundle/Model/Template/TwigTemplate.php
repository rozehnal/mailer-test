<?php

namespace Paro\MailerBundle\Model\Template;

use Paro\MailerBundle\Model\TemplateInterface;

class TwigTemplate implements TemplateInterface
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct($twig)
    {

        $this->twig = $twig;
    }

    public function setPlaintextTemplate($plainTemplate)
    {
        // TODO: Implement setPlaintextTemplate() method.
        return $this;
    }

    public function setHtmlTemplate($htmlTemplate)
    {
        // TODO: Implement setHtmlTemplate() method.
        return $this;
    }

    public function getText(array $params)
    {
        // TODO: Implement getText() method.
        return 'content';
    }
}