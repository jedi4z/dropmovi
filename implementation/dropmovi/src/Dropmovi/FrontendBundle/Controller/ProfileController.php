<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller{
    
    
    public function ProfileAction(){
        return $this->render("DropmoviFrontendBundle:Profile:profile.html.twig");
    }
}

?>
