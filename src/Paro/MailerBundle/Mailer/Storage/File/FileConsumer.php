<?php


namespace Paro\MailerBundle\Mailer\Storage\File;

use Paro\MailerBundle\Mailer\MessageInterface;
use Paro\MailerBundle\Mailer\Sender\SenderInterface;
use Paro\MailerBundle\Mailer\Archiver\ArchiverInterface;
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
    /**
     * @var ArchiverInterface
     */
    private $archiver;

    /**
     * @param $dirname
     * @param SenderInterface $sender
     * @param ArchiverInterface $archiver
     */
    public function __construct($dirname, SenderInterface $sender, ArchiverInterface $archiver = null)
    {

        $this->dirname = $dirname;
        $this->sender = $sender;
        $this->archiver = $archiver;
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
        var_dump('confirmed - ' . $message->getInfo()->getUID());

        if (!is_null($this->archiver)) {
            $this->archiver->store($message);
        }

        unlink($message->getInfo()->getUID());
    }
}