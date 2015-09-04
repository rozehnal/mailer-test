<?php


namespace Paro\MailerBundle\Mailer;


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



}