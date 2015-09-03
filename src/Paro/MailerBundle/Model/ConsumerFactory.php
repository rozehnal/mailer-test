<?php


namespace Paro\MailerBundle\Model;


use Paro\MailerBundle\Model\File\FileConsumer;

class ConsumerFactory
{
    public function createNewConsumer($storage)
    {
        return new FileConsumer("/Applications/XAMPP/htdocs/mailer-bundle/Tests/data");
    }

}