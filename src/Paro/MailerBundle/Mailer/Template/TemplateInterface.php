<?php


namespace Paro\MailerBundle\Mailer\Template;


use Paro\MailerBundle\Mailer\MessageInterface;

interface TemplateInterface
{
    public function setPlaintextTemplate($plainTemplate);

    public function setHtmlTemplate($htmlTemplate);

    public function updateMessage(MessageInterface $message, array $params);
}