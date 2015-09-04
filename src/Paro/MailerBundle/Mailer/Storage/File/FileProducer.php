<?php

namespace Paro\MailerBundle\Mailer\Storage\File;

use Paro\MailerBundle\Mailer\MessageInterface;
use Paro\MailerBundle\Mailer\MessageWrapper;
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

        $messageWrapper = $message->getWrapperMessage();
        $messageWrapper->setUID($filename);
        $messageWrapper->setMessage($message);

        $data = serialize($messageWrapper);
        fwrite($fp, $data);
        fclose($fp);
    }
}