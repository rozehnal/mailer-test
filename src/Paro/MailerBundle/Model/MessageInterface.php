<?php
namespace Paro\MailerBundle\Model;

interface MessageInterface
{
    /**
     * @return array|string
     */
    public function getTo();

    /**
     * @param array|string $to
     */
    public function setTo($to);

    /**
     * @return array|string
     */
    public function getCc();

    /**
     * @param array|string $cc
     */
    public function setCc($cc);

    /**
     * @return array|string
     */
    public function getBcc();

    /**
     * @param array|string $bcc
     */
    public function setBcc($bcc);

    /**
     * @return string
     */
    public function getPlainContent();

    /**
     * @param string $plainContent
     */
    public function setPlainContent($plainContent);

    /**
     * @return string
     */
    public function getHtmlContent();

    /**
     * @param string $htmlContent
     */
    public function setHtmlContent($htmlContent);

    /**
     * @return array
     */
    public function getAttachements();

    /**
     * @param array $attachements
     */
    public function setAttachements($attachements);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @param TemplateInterface $template
     * @return mixed
     */
    public function setTemplate(TemplateInterface $template);
}