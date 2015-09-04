<?php


namespace Paro\MailerBundle\Mailer\Storage\File;

use Paro\MailerBundle\Mailer\Storage\ConsumerInterface;
use Paro\MailerBundle\Mailer\Storage\MessageInterface;

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