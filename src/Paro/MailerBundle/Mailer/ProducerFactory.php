<?php


namespace Paro\MailerBundle\Mailer;


use Paro\MailerBundle\Mailer\Storage\File\FileProducer;

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