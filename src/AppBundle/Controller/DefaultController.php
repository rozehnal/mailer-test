<?php

namespace AppBundle\Controller;

use Paro\MailerBundle\Mailer\Storage\File\FileConsumer;
use Paro\MailerBundle\Mailer\Storage\File\FileProducer;
use Paro\MailerBundle\Mailer\Mailer;
use Paro\MailerBundle\Mailer\Message;
use Paro\MailerBundle\Mailer\Template\TemplateInterface;
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

        /**
         * @var Mailer $mailer
         */
        $mailer = $this->get('paromailer.mailer');




        /** @var TemplateInterface $template */
        $template = $mailer->newTemplate('twig')
            ->setPlaintextTemplate('default/index.html.twig')
            ->setHtmlTemplate('default/index.html.twig');

        $message = $mailer->newMessage('subject')
            ->setTo('tester@tester.cz')
            ->setPlainContent('message1')
            ;

        $template->updateMessage($message, array('base_dir'=> 'parameter template'));

        $mailer->getProducer()->add($message);

        $message = $mailer->newMessage('subject')
            ->setTo('tester@tester.cz')
            ->setPlainContent('message2')
            //->setTemplate(null, array())
        ;

        $mailer->getProducer()->add($message);

        $consumer = $mailer->getConsumer();
        $messageRecieved = $consumer->get();
        $consumer->confirm($messageRecieved);

        $consumer->process(1);

        var_dump($messageRecieved);



        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
