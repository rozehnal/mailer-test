<?php

namespace Paro\MailerBundle\Model\File;

use Paro\MailerBundle\Model\MessageInterface;
use Paro\MailerBundle\Model\ProducerInterface;

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