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
            ->setPlaintextTemplate(null)
            ->setHtmlTemplate(null);

        $message = $mailer->newMessage('subject')
            ->setTo('tester@tester.cz')
            ->setPlainContent('message1')
            ;

        $template->updateMessage($message, array());

        //$mailer->getProducer()->add($message);

        $message = $mailer->newMessage('subject')
            ->setTo('tester@tester.cz')
            ->setPlainContent('message2')
            //->setTemplate(null, array())
        ;

        $mailer->getProducer()->add($message);
        $messageRecieved = $mailer->getConsumer()->get();
        $mailer->getConsumer()->confirm($messageRecieved);

        var_dump($messageRecieved);



        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
