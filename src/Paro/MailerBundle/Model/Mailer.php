<?php


namespace Paro\MailerBundle\Model;


use Paro\MailerBundle\Model\Template\TwigTemplate;

class Mailer implements MailerInterface
{

    /**
     * @var
     */
    private $engine;
    /**
     * @var
     */
    private $producer;
    /**
     * @var
     */
    private $consumer;

    public function __construct($engine, $producer, $consumer)
    {

        $this->engine = $engine;
        $this->producer = $producer;
        $this->consumer = $consumer;
    }


    /**
     * @return string
     */
    public function getEngine()
    {
        // TODO: Implement getEngine() method.
    }

    /**
     * @return ProducerInterface
     */
    public function getProducer()
    {
        // TODO: Implement getProducer() method.
        return $this->producer;
    }

    /**
     * @return ConsumerInterface
     */
    public function getConsumer()
    {
        // TODO: Implement getConsumer() method.
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
        switch($engine) {
            case 'twig':
                return new TwigTemplate($engine);
        }
    }
}