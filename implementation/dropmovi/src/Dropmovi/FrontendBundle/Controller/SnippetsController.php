<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SnippetsController extends Controller{
    
    public function listPublicationsAction($filter){
        $em = $this->getDoctrine()->getEntityManager();
        switch ($filter){
            case "recents":
                $publications = $em->getRepository("DropmoviBackendBundle:Publication")->getLastPublications();
                break;
            case "popular":
                $publications = $em->getRepository("DropmoviBackendBundle:Publication")->getPopularPublications();
                break;
            case "all":
                $publications = $em->getRepository("DropmoviBackendBundle:Publication")->getAllPublications();
                break;
            default:
                $publications = $em->getRepository("DropmoviBackendBundle:Publication")->getLastPublications();
        }
        
        return $this->render("DropmoviFrontendBundle:Snippets:listPublications.html.twig", array ("publications" => $publications));
    }
}

?>
