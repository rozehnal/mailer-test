<?php


namespace Paro\MailerBundle\Model;


interface TemplateInterface
{
    public function setPlaintextTemplate($plainTemplate);

    public function setHtmlTemplate($htmlTemplate);

    public function updateMessage(MessageInterface $message, array $params);
}