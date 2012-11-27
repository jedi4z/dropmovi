<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MailerController extends Controller{
    
    /**
     * 
     * Send an invitation to fiends.
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sendInvitationAction(){
        $to = $this->getRequest()->get('to');
        $this->get('mailer.manager')->sendEmail('info@agilecode.com', $to , 'Prueba', 'hola');
        return new Response('Gracias por difundir');
    }
    
}

?>
