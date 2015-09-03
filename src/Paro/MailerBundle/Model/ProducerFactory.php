<?php


namespace Paro\MailerBundle\Model;


use Paro\MailerBundle\Model\File\FileProducer;

class ProducerFactory
{
    public function createNewProducer($storage)
    {
        return new FileProducer("/Applications/XAMPP/htdocs/mailer-bundle/Tests/data");
    }

}