<?php


namespace Paro\MailerBundle\Model;


interface ProducerInterface
{
    public function add(MessageInterface $message);
}