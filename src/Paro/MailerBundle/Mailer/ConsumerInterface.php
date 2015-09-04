<?php


namespace Paro\MailerBundle\Mailer;


interface ConsumerInterface
{
    /**
     * @return MessageInterface
     */
    public function get();

}