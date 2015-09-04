<?php


namespace Paro\MailerBundle\Model;


use Paro\MailerBundle\Model\File\FileConsumer;

class ConsumerFactory
{
    public function createNewConsumer($storage, array $parameters)
    {
        $folder = $parameters['folder'];
        return new FileConsumer($folder);
    }

}