<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller {

    public function indexAction() {
        return $this->render('DropmoviFrontendBundle:Homepage:homepage.html.twig');
    }

}
