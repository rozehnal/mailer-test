<?php


namespace Paro\MailerBundle\Model;


use Paro\MailerBundle\Model\File\FileProducer;

class ProducerFactory
{
    public function createNewProducer($type, array $parameters)
    {
        switch($type) {
            case 'folder':
                $folder = $parameters['folder'];
                return new FileProducer($folder);
        }
    }

}