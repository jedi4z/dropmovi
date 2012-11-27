<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\SigninUserType;
use Dropmovi\FrontendBundle\Entity\User;

class SigninController extends Controller {

    public function signinAction() {
        $user = new User();
        $form = $this->createForm(new SigninUserType(), $user);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $this->get('user.manager')->addUser($user);
                $this->get('mailer.manager')->sendEmail('info@agilecode.com.ar', $user->getEmail(), 'Bienvenido', $this->renderView('DropmoviFrontendBundle:Mailer:welcome.html.twig', array('name' => $user->getName())));
                $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
                $this->get('security.context')->setToken($token);
                return $this->render('DropmoviFrontendBundle:Signin:signinSuccess.html.twig');
            }
        }
        return $this->render('DropmoviFrontendBundle:Signin:signin.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * 
     * Render the step one of the registration.
     * 
     * @return Response
     */
    public function signinStepOneAction() {
        return $this->render('DropmoviFrontendBundle:Signin:signinStepOne.html.twig');
    }
    
    /**
     * 
     * Render the step two of the registration and
     * change the user's profile photo. 
     * 
     * @return Response
     */
    public function signinStepTwoAction() {
        return $this->render('DropmoviFrontendBundle:Signin:signinStepTwo.html.twig');
    }

    public function accountAction() {
        return $this->render('DropmoviFrontendBundle:Signin:signinSuccess.html.twig');
    }

}

?>
