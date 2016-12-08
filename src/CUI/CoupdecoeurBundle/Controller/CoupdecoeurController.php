<?php

namespace CUI\CoupdecoeurBundle\Controller;

use CUI\CoupdecoeurBundle\Entity\Newsletter;
use CUI\CoupdecoeurBundle\Entity\Cadeau;
use CUI\CoupdecoeurBundle\Entity\Photo;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoupdecoeurController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

    	$listeNewsletters = $em->getRepository('CUICoupdecoeurBundle:Newsletter');

    	$news1 = $listeNewsletters->findOneBy(
												array('estPublie'=>1),
												array('datePublication'=>'DESC')
											);


		$newsletters = $listeNewsletters->findBy(
													array('estPublie'=>1),
													array('datePublication'=>'DESC'),
													50000,
													1
												);

		return $this->render('CUICoupdecoeurBundle:Coupdecoeur:index.html.twig', array('news1'=>$news1,'newsletters'=>$newsletters));

    }

    public function viewAction(Newsletter $newsletter)
    {
    	$em = $this->getDoctrine()->getManager();

    	$listeNewsletters = $em->getRepository('CUICoupdecoeurBundle:Newsletter');

    	$news = $listeNewsletters->find($newsletter);

		return $this->render('CUICoupdecoeurBundle:Coupdecoeur:view.html.twig', array('news'=>$news));

    }

}