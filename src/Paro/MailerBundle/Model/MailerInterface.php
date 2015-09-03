<?php


namespace Paro\MailerBundle\Model;


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