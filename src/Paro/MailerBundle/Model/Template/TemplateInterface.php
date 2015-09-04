<?php


namespace Paro\MailerBundle\Model\Template;


use Paro\MailerBundle\Model\MessageInterface;

interface TemplateInterface
{
    public function setPlaintextTemplate($plainTemplate);

    public function setHtmlTemplate($htmlTemplate);

    public function updateMessage(MessageInterface $message, array $params);
}