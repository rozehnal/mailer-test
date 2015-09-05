<?php


namespace Paro\MailerBundle\Mailer;


use Paro\MailerBundle\Mailer\Archiver\ArchiverInterface;
use Paro\MailerBundle\Mailer\Storage\ConsumerInterface;
use Paro\MailerBundle\Mailer\Storage\ProducerInterface;
use Paro\MailerBundle\Mailer\Template\TemplateFactory;
use Paro\MailerBundle\Mailer\Template\TwigTemplate;

class Mailer implements MailerInterface
{

    /**
     * @var ProducerInterface
     */
    private $producer;
    /**
     * @var ConsumerInterface
     */
    private $consumer;
    /**
     * @var TemplateFactory
     */
    private $templateFactory;

    /**
     * @param ProducerInterface $producer
     * @param ConsumerInterface $consumer
     * @param TemplateFactory $templateFactory
     */
    public function __construct(ProducerInterface $producer, ConsumerInterface $consumer, TemplateFactory $templateFactory)
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