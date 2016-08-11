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
    	if(null === $page_actuelle) {
    		throw new NotFoundHttpException('Page inexistante.');
    	} else {
    		return $this->render('CUIPagesBundle:Pages:index.html.twig', array('page'=>$page_actuelle));
    	}

    }

}