<?php

namespace CUI\PagesBundle\Controller;

use CUI\PagesBundle\Entity\Rubrique;
use CUI\PagesBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PagesController extends Controller
{
    public function indexAction(Page $page_actuelle)
    {

    	$em = $this->getDoctrine()->getManager();

    	$listeRubriques = $em->getRepository('CUIPagesBundle:Rubrique');

    	$listePages = $em->getRepository('CUIPagesBundle:Page');

    	$menu = $listeRubriques->findAll();

    	foreach($menu as $rub) {

    		$rub->pages =  $listePages->findBy(array("rubrique"=>$rub));

    	}

    	if(null === $page_actuelle) {
    		throw new NotFoundHttpException('Page inexistante.');
    	} else {
    		return $this->render(

    			'CUIPagesBundle:Pages:index.html.twig',

    			array(
    				'rubrique'=>$page_actuelle->getRubrique()->getNom(),
    				'nom'=>$page_actuelle->getNom(),
    				'titre'=>$page_actuelle->getTitre(),
    				'contenu'=>$page_actuelle->getContenu(),
    				'menu'=>$menu,
    				'nbrub'=>count($menu)
    				)
    			);
    	}

    }

}