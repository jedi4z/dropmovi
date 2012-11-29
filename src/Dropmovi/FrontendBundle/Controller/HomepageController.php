<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller {
    
    /**
     * 
     * Render the homepage.
     * 
     * @return Response
     */
    public function indexAction() {
        return $this->render('DropmoviFrontendBundle:Homepage:homepage.html.twig');
    }

}
