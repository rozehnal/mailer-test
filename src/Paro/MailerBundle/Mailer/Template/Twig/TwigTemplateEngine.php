<?php


namespace Paro\MailerBundle\Mailer\Template\Twig;


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