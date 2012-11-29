<?php

namespace Dropmovi\FrontendBundle\EventListener;

use Dropmovi\FrontendBundle\Event\MailerEvent;
use \Swift_Message;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class MailerListener {

    protected $mailer;
    protected $templating;

    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating) {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function onSendInvitation(MailerEvent $event) {
        $guest = $event->getGuest();
        $message = Swift_Message::newInstance()
                ->setFrom('info@agilecode.com.ar')
                ->setTo($guest->getEmail())
                ->setSubject('Hola!')
                ->setBody('Hoooollla desde dispatcher');
        $this->mailer->send($message);
    }

}

?>