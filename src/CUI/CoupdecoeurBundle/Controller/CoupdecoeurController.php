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
												array('dateEmailing'=>'DESC')
											);

        $news2 = $listeNewsletters->findBy(
                                                array('estPublie'=>1),
                                                array('dateEmailing'=>'DESC'),
                                                1,
                                                1
                                            );
        $news3 = $listeNewsletters->findBy(
                                                array('estPublie'=>1),
                                                array('dateEmailing'=>'DESC'),
                                                1,
                                                2
                                            );


		$newsletters = $listeNewsletters->findBy(
													array('estPublie'=>1),
													array('dateEmailing'=>'DESC'),
													50000,
													3
												);

		return $this->render('CUICoupdecoeurBundle:Coupdecoeur:index.html.twig', array('news1'=>$news1,'news2'=>$news2[0],'news3'=>$news3[0], 'newsletters'=>$newsletters));

    }

    public function viewAction(Newsletter $newsletter)
    {
    	$em = $this->getDoctrine()->getManager();

    	$listeNewsletters = $em->getRepository('CUICoupdecoeurBundle:Newsletter');

    	$news = $listeNewsletters->find($newsletter);

		$response = $this->render('CUICoupdecoeurBundle:Coupdecoeur:view.html.twig', array('news'=>$news));

        // cache for 3600 seconds
        $response->setSharedMaxAge(1);

        // (optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);

        return $response;

    }

}