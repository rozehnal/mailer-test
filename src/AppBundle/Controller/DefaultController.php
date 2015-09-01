<?php

namespace AppBundle\Controller;

use Paro\MailerBundle\Model\File\FileConsumer;
use Paro\MailerBundle\Model\File\FileProducer;
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


        $message = new Message();
        $message->setTo('tester@tester.cz');
        $message->setPlainContent('plain_text');

        $folder = '/Applications/XAMPP/htdocs/mailer-bundle/Tests/data';

        $producer = new FileProducer($folder);
        $producer->add($message);

        $consumer = new FileConsumer($folder);
        $messageRecieved = $consumer->get();

        var_dump($messageRecieved);


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
