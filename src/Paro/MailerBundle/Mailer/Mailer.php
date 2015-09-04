<?php


namespace Paro\MailerBundle\Mailer;


use Paro\MailerBundle\Mailer\Storage\ConsumerInterface;
use Paro\MailerBundle\Mailer\Storage\ProducerInterface;
use Paro\MailerBundle\Mailer\Template\TemplateFactory;
use Paro\MailerBundle\Mailer\Template\TwigTemplate;

class Mailer implements MailerInterface
{

    /**
     * @var
     */
    private $producer;
    /**
     * @var
     */
    private $consumer;
    /**
     * @var TemplateFactory
     */
    private $templateFactory;

    /**
     * @param $engine
     * @param $producer
     * @param $consumer
     * @param TemplateFactory $templateFactory
     */
    public function __construct($producer, $consumer, TemplateFactory $templateFactory)
    {
        $this->producer = $producer;
        $this->consumer = $consumer;
        $this->templateFactory = $templateFactory;
    }


    /**
     * @return ProducerInterface
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * @return ConsumerInterface
     */
    public function getConsumer()
    {
        return $this->consumer;
    }

    /**
     * @param $engine
     * @return MessageInterface
     */
    public function newMessage($subject = null)
    {
        $message =  new Message();
        $message->setTitle($subject);
        return $message;
    }

    /**
     * @param $engine
     * @return TemplateInterface
     */
    public function newTemplate($engine)
    {
        $template = $this->templateFactory->newTemplate($engine);
        return $template;
    }
}