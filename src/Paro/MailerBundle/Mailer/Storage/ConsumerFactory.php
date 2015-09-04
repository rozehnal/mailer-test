<?php


namespace Paro\MailerBundle\Mailer\Storage;


use Paro\MailerBundle\Mailer\Exception\StorageNotFoundException;
use Paro\MailerBundle\Mailer\Storage\File\FileConsumer;

class ConsumerFactory
{
    public function createNewConsumer($type, array $parameters)
    {
        switch($type) {
            case 'folder':
                $folder = $parameters['folder'];
                return new FileConsumer($folder);
            default:
                throw new StorageNotFoundException(sprintf('Storage %s not found.', $type));
        }
    }

}