<?php

namespace Dropmovi\FrontendBundle\Service;

use \Swift_Message;

class MailerManager {

    protected $mailer;

    public function __construct(\Swift_Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function sendEmail($from, $to, $subject, $body) {
        $message = Swift_Message::newInstance()
                ->setFrom($from)
                ->setTo($to)
                ->setSubject($subject)
                ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }

}

?>