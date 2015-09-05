<?php


namespace Paro\MailerBundle\Mailer\Storage;


use Paro\MailerBundle\Mailer\MessageInterface;

interface ConsumerInterface
{
    /**
     * @return MessageInterface
     */
    public function get();

    public function process($count = 1);

    public function confirm(MessageInterface $message);


}