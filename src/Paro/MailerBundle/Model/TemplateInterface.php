<?php


namespace Paro\MailerBundle\Model;


interface TemplateInterface
{
    public function setPlaintextTemplate($plainTemplate);

    public function setHtmlTemplate($htmlTemplate);

    public function getText(array $params);
}