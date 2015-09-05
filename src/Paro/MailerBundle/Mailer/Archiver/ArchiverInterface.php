<?php


namespace Paro\MailerBundle\Mailer\Archiver;


use Paro\MailerBundle\Mailer\MessageInterface;

interface ArchiverInterface
{
    public function store(MessageInterface $message);
    public function load($uid);
    public function getTotalCount();
    public function getPage($start, $pageLength, $sort);
}