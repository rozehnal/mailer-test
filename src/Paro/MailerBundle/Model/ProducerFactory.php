<?php


namespace Paro\MailerBundle\Model;


use Paro\MailerBundle\Model\File\FileProducer;

class ProducerFactory
{
    public function createNewProducer($type, array $parameters)
    {
        $folder = $parameters['folder'];
        return new FileProducer($folder);
    }

}