<?php


namespace Paro\MailerBundle\Mailer\Storage;


use Paro\MailerBundle\Mailer\MessageInterface;

interface ConsumerInterface
{
    /**
     * @return MessageInterface
     */
    public function get();

}