ParoMailer
===========

An universal mailer for huge amount message. 
Provide enrolling each message into que, logging and detached sending by other process.

Configuration
---
    #config.yml
    paro_mailer:
        storage:
            type: folder
            parameters:
                folder: %paro_mailer.folder%
        sender: swiftmailer

Adding email's templating system
---
    #services.yml
    paromailer.template.engine.twig:
        class: Paro\MailerBundle\Mailer\Template\Twig\TwigTemplateEngine
        arguments:
            - "@twig"
        tags:
            -  { name: paromailer.template.engine, alias: 'twig' }
            
By using tagged services you can add any other template's system.

Example
----

$mailer = $this->get('paromailer.mailer');




        /** @var TemplateInterface $template */
        $template = $mailer->newTemplate('twig')
            ->setPlaintextTemplate('default/index.html.twig')
            ->setHtmlTemplate(null);

        $message = $mailer->newMessage('subject')
            ->setTo('tester@tester.cz')
            ->setPlainContent('message1')
            ;

        $template->updateMessage($message, array('base_dir'=> 'root'));

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

