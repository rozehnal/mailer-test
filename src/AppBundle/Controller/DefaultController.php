<?php

namespace AppBundle\Controller;

use Paro\MailerBundle\Model\File\FileConsumer;
use Paro\MailerBundle\Model\File\FileProducer;
use Paro\MailerBundle\Model\Mailer;
use Paro\MailerBundle\Model\Message;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $mailer = $this->get('paromailer.mailer');
        $template = $mailer->newTemplate('twig')
            ->setPlaintextTemplate('')
            ->setHtmlTemplate('');

        $message = $mailer->newMessage('subject')
            ->setTo('tester@tester.cz')
            ->setPlainContent('plain_text')
            ->setTemplate($template, array());

        $mailer->getProducer()->add($message);
        $messageRecieved = $mailer->getConsumer()->get();

        var_dump($messageRecieved);


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
