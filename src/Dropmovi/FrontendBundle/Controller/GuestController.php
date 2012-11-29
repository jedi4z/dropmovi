<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\Type\GuestType;
use Symfony\Component\HttpFoundation\Response;
use Dropmovi\FrontendBundle\Entity\Guest;

class GuestController extends Controller {

    public function sendInvitationAction() {
        $guest = new Guest();
        $form = $this->createForm(new GuestType(), $guest);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $user = $this->getUser();
                $this->get('guest.manager')->addGuest($guest, $user);
                $this->get('mailer.manager')->sendInvitation($guest);
                return new Response('¡Gracias!, hemos enviado tu invitación');
            }
        }
        return $this->render('DropmoviFrontendBundle:Guest:sendInvitation.html.twig', array('form' => $form->createView()));
    }

}

?>
