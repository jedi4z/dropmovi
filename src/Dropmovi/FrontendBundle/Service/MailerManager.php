<?php

namespace Dropmovi\FrontendBundle\Service;

use \Swift_Message;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class MailerManager {

    protected $mailer;
    protected $templating;

    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating) {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }
    
    /**
     * 
     * Send the welcome email.
     * 
     * @param User $user
     */
    public function sendWelcome($user) {
        $message = Swift_Message::newInstance()
                ->setFrom(array('not-replay@dropmovi.com' => 'Dropmovi'))
                ->setTo($user->getEmail())
                ->setSubject('Bienvenido a Dropmovi')
                ->setBody($this->templating->render('DropmoviFrontendBundle:Mailer:welcome.html.twig', array('name' => $user->getName())), 'text/html');       
        

        $this->mailer->send($message);
    }
    
    public function sendInvitation($user, $guest){
        $message = Swift_Message::newInstance()
                ->setFrom(array('not-replay@dropmovi.com' => 'Dropmovi'))
                ->setTo($guest->getEmail())
                ->setSubject($user->getName().' '.$user->getLastName().' '.'te invitó a Dropmovi')
                ->setBody($this->templating->render('DropmoviFrontendBundle:Mailer:invitation.html.twig', array('name' => $user->getName())), 'text/html');       
        

        $this->mailer->send($message);
    }

}

?>