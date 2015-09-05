<?php


namespace Paro\MailerBundle\Mailer\Archiver\Folder;

use Paro\MailerBundle\Mailer\Archiver\ArchiverInterface;
use Paro\MailerBundle\Mailer\MessageInterface;

class FolderArchiver implements ArchiverInterface
{

    public function __construct($folder)
    {
        $this->folder = $folder;
    }

    public function store(MessageInterface $message)
    {
        // TODO: Implement store() method.
    }

    public function load($uid)
    {
        // TODO: Implement load() method.
    }

    public function getTotalCount()
    {
        // TODO: Implement getTotalCount() method.
    }

    public function getPage($start, $pageLength, $sort)
    {
        // TODO: Implement getPage() method.
    }
}