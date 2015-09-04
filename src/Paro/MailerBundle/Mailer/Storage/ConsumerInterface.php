<?php


namespace Paro\MailerBundle\Mailer\Storage;


use Paro\MailerBundle\Mailer\MessageWrapperInterface;

interface ConsumerInterface
{
    /**
     * @return MessageWrapperInterface
     */
    public function get();

}