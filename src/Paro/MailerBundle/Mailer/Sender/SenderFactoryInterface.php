<?php


namespace Paro\MailerBundle\Mailer\Sender;


interface SenderFactoryInterface
{
    public function addEngine($name, $service);
    public function getMailer($type = null);
}