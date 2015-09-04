<?php


namespace Paro\MailerBundle\Model;


use Paro\MailerBundle\Model\File\FileConsumer;

class ConsumerFactory
{
    public function createNewConsumer($type, array $parameters)
    {
        switch($type) {
            case 'folder':
                $folder = $parameters['folder'];
                return new FileConsumer($folder);
        }
    }

}