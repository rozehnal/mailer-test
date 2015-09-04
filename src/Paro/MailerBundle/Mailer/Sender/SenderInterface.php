<?php


namespace Paro\MailerBundle\Mailer\Sender;


use Paro\MailerBundle\Mailer\MessageInterface;

interface SenderInterface
{
    /**
     * @param MessageInterface $message
     * @return SenderInterface
     */
    public function send(MessageInterface $message);
}