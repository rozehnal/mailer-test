<?php


namespace Paro\MailerBundle\Mailer\Storage\File;

use Paro\MailerBundle\Mailer\MessageInterface;
use Paro\MailerBundle\Mailer\Sender\SenderInterface;
use Paro\MailerBundle\Mailer\Storage\ConsumerInterface;

class FileConsumer implements ConsumerInterface
{

    /**
     * @var string
     */
    private $dirname;
    /**
     * @var SenderInterface
     */
    private $sender;

    public function __construct($dirname, SenderInterface $sender)
    {

        $this->dirname = $dirname;
        $this->sender = $sender;
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


        return $message;
    }

    public function process($count = 1)
    {
        for ($i=0; $i<$count; $i++) {
            $message = $this->get();
            $this->sender->send($message);
            $this->confirm($message);
        }

    }

    public function confirm(MessageInterface $message)
    {
        var_dump('confirm - ' . $message->getInfo()->getUID());
        unlink($message->getInfo()->getUID());
    }
}