<?php

namespace Paro\MailerBundle\Mailer\Storage\File;

use Paro\MailerBundle\Mailer\MessageInterface;
use Paro\MailerBundle\Mailer\Storage\ProducerInterface;

class FileProducer implements ProducerInterface
{

    private $dirname;

    public function __construct($dirname)
    {
        $this->dirname = $dirname;
    }

    public function add(MessageInterface $message)
    {
        $date = new \DateTime('NOW');
        $prefix = $date->format('Y-m-d_H-i-s');

        $filename = tempnam($this->dirname, $prefix . '_message_');
        $fp = fopen($filename, 'w');


        $messageInfo = $message->getInfo();
        $messageInfo->setUID($filename);

        $data = serialize($message);

        fwrite($fp, $data);
        fclose($fp);
    }
}