<?php

namespace AppBundle\Controller;

use Paro\MailerBundle\Model\File\FileConsumer;
use Paro\MailerBundle\Model\File\FileProducer;
use Paro\MailerBundle\Model\Mailer;
use Paro\MailerBundle\Model\Message;
use Paro\MailerBundle\Model\TemplateInterface;
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

        var_dump($messageRecieved);



        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
