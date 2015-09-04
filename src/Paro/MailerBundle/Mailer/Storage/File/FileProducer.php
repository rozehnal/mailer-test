<?php

namespace Paro\MailerBundle\Mailer\Storage\File;

use Paro\MailerBundle\Mailer\MessageInterface;
use Paro\MailerBundle\Mailer\ProducerInterface;

class FileProducer implements ProducerInterface
{

    private $dirname;

    public function __construct($dirname)
    {
        $this->dirname = $dirname;
    }

    public function add(MessageInterface $message)
    {
        $date = new \DateTime('2000-01-01');
        $prefix = $date->format('Y-m-d_H-i-s');

        $filename = tempnam($this->dirname, $prefix . '_message_');
        $fp = fopen($filename, 'w');
        $data = serialize($message);
        fwrite($fp, $data);
        fclose($fp);
    }
}