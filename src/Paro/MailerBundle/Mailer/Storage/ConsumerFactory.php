<?php


namespace Paro\MailerBundle\Mailer\Storage;


use Paro\MailerBundle\Mailer\Archiver\ArchiverInterface;
use Paro\MailerBundle\Mailer\Exception\StorageNotFoundException;
use Paro\MailerBundle\Mailer\Sender\SenderFactoryInterface;
use Paro\MailerBundle\Mailer\Sender\SenderInterface;
use Paro\MailerBundle\Mailer\Storage\File\FileConsumer;

class ConsumerFactory
{
    /**
     * @var SenderInterface
     */
    private $engine;


    /**
     * @var ArchiverInterface
     */
    private $archiver;

    /**
     * @param $type
     * @param array $parameters
     * @param SenderFactoryInterface $senderFactory
     * @return FileConsumer
     * @throws StorageNotFoundException
     */
    public function createNewConsumer($type, array $parameters, SenderFactoryInterface $senderFactory)
    {
        $this->engine = $senderFactory->getMailer();

        switch($type) {
            case 'folder':
                $folder = $parameters['folder'];
                return new FileConsumer($folder, $this->engine, $this->archiver);
            default:
                throw new StorageNotFoundException(sprintf('Storage %s not found.', $type));
        }
    }


    /**
     * @param ArchiverInterface $archiver
     */
    public function setArchiver(ArchiverInterface $archiver)
    {
        $this->archiver = $archiver;
    }
}