<?php


namespace Paro\MailerBundle\Mailer;


use Paro\MailerBundle\Mailer\Storage\ConsumerInterface;
use Paro\MailerBundle\Mailer\Storage\ProducerInterface;
use Paro\MailerBundle\Mailer\Template\TemplateInterface;

interface MailerInterface
{

    /**
     * @return ProducerInterface
     */
    public function getProducer();

    /**
     * @return ConsumerInterface
     */
    public function getConsumer();

    /**
     * @return MessageInterface
     */
    public function newMessage($subject = null);

    /**
     * @return TemplateInterface
     */
    public function newTemplate($engine);



}