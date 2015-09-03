<?php


namespace Paro\MailerBundle\Model\Template\Engine;

use Paro\MailerBundle\Model\Template\TwigTemplate;

class TwigTemplateEngine implements  TemplateEngineInterface
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {

        $this->twig = $twig;
    }

    public function getName()
    {
        return 'twig';
    }

    public function newTemplate()
    {
        $template =  new TwigTemplate($this->twig);
        return $template;
    }
}