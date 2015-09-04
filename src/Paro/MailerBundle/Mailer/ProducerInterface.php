<?php


namespace Paro\MailerBundle\Mailer;


interface ProducerInterface
{
    public function add(MessageInterface $message);
}