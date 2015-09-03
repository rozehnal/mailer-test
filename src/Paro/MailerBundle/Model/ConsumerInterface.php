<?php


namespace Paro\MailerBundle\Model;


interface ConsumerInterface
{
    /**
     * @return MessageInterface
     */
    public function get();

}