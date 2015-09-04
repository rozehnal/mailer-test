<?php


namespace Paro\MailerBundle\Mailer;


use Symfony\Component\Validator\Constraints\DateTime;

class MessageWrapper implements MessageWrapperInterface
{

    /**
     * @var string
     */
    private $uid;

    /**
     * @var MessageInterface
     */
    private $message = null;

    /**
     * @var \DateTime
     */
    private $storeDateTime = null;

    private $templatePlaintextName = null;
    private $templatePlaintextParameters = null;

    private $templateHtmltName = null;
    private $templateHtmlParameters = null;



    public function __construct()
    {
        $this->storeDateTime = new \DateTime();
    }

    /**
     * @param MessageInterface $message
     */
    public function setMessage(MessageInterface $message)
    {
        $this->message = $message;
    }

    /**
     * @return null|MessageInterface
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return null|string
     */
    public function getUID()
    {
        return $this->uid;
    }

    /**
     * @return \DateTime
     */
    public function getStoredDateTime()
    {
        return $this->storeDateTime;
    }

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function setTemplatePlantextInfo($name, array $params)
    {
        $this->templatePlaintextName = $name;
        $this->templatePlaintextParameters = $params;
    }

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function setTemplateHtmltInfo($name, array $params)
    {
        $this->templateHtmltName = $name;
        $this->templateHtmlParameters = $params;
    }

    public function setUID($uid)
    {
        $this->uid = $uid;
    }
}