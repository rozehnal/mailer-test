<?php


namespace Paro\MailerBundle\Mailer;


interface MessageWrapperInterface
{
    public function setMessage(MessageInterface $message);
    public function getMessage();

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function setTemplatePlantextInfo($name, array $params);

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function setTemplateHtmltInfo($name, array $params);

    public function setUID($uid);
    public function getUID();
    public function getStoredDateTime();
}