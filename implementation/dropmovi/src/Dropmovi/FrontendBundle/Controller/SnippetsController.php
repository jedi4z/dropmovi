<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SnippetsController extends Controller{
    
    public function listPublicationsAction($filter){
        $em = $this->getDoctrine()->getEntityManager();
        switch ($filter){
            case "recents":
                $publications = $em->getRepository("DropmoviFrontendBundle:Publication")->getLastPublications();
                break;
            case "popular":
                $publications = $em->getRepository("DropmoviFrontendBundle:Publication")->getPopularPublications();
                break;
            case "all":
                $publications = $em->getRepository("DropmoviFrontendBundle:Publication")->getAllPublications();
                break;
            default:
                $publications = $em->getRepository("DropmoviFrontendBundle:Publication")->getLastPublications();
        }
        
        return $this->render("DropmoviFrontendBundle:Snippets:listPublications.html.twig", array ("publications" => $publications));
    }
}

?>
