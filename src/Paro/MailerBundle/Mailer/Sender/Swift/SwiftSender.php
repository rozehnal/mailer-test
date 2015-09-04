<?php


namespace Paro\MailerBundle\Mailer\Sender\Swift;

use Paro\MailerBundle\Mailer\MessageInterface;
use Paro\MailerBundle\Mailer\Sender\SenderInterface;

class SwiftSender implements SenderInterface
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {

        $this->mailer = $mailer;
    }

    /**
     * @param MessageInterface $message
     * @return SenderInterface|void
     */
    public function send(MessageInterface $message)
    {
        //TODO: process message by $this->mailer;
    }
}