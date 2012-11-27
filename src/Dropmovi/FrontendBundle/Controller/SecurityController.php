<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller {
    
    /**
     * 
     * Render the form login.
     * 
     * @return Response
     */
    public function loginAction() {
        return $this->render('DropmoviFrontendBundle:Security:login.html.twig');
    }

}

?>
