<?php


namespace Paro\MailerBundle\Mailer\Storage;


use Paro\MailerBundle\Mailer\MessageInterface;

interface ProducerInterface
{
    public function add(MessageInterface $message);
}