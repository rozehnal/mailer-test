<?php


namespace Paro\MailerBundle\Mailer;


interface MessageInfoInterface
{

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