<?php


namespace Paro\MailerBundle\Model\File;

use Paro\MailerBundle\Model\ConsumerInterface;
use Paro\MailerBundle\Model\MessageInterface;

class FileConsumer implements ConsumerInterface
{

    /**
     * @var string
     */
    private $dirname;

    public function __construct($dirname)
    {

        $this->dirname = $dirname;
    }
    /**
     * @return MessageInterface
     */
    public function get()
    {
        $files = glob( $this->dirname . '/*' );
        $filename = $files[0];
        $data = file_get_contents($filename);

        /** @var MessageInterface $message */
        $message = unserialize($data);

        unlink($filename);

        return $message;
    }
}