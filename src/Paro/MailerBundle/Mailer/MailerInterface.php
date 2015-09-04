<?php


namespace Paro\MailerBundle\Mailer;


interface MailerInterface
{

    /**
     * @return string
     */
    public function getEngine();

    /**
     * @return ProducerInterface
     */
    public function getProducer();

    /**
     * @return ConsumerInterface
     */
    public function getConsumer();



}