<?php

namespace CUI\CoreBundle\Controller;

use CUI\PagesBundle\Entity\Rubrique;
use CUI\PagesBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoreController extends Controller
{

  public function menuAction()
  {
    $em = $this->getDoctrine()->getManager();

    $listeRubriques = $em->getRepository('CUIPagesBundle:Rubrique');

    $listePages = $em->getRepository('CUIPagesBundle:Page');

    $menu = $listeRubriques->findAll();

    foreach($menu as $rub) {

      $rub->pages =  $listePages->findBy(array("rubrique"=>$rub));

    }

    return $this->render('CUICoreBundle:Core:menu.html.twig', array(
          'menu'=>$menu,
          'nbrub'=>count($menu)
          ));
  }

  public function footerAction()
  {
    $em = $this->getDoctrine()->getManager();

    $listeRubriques = $em->getRepository('CUIPagesBundle:Rubrique');

    $listePages = $em->getRepository('CUIPagesBundle:Page');

    $menu = $listeRubriques->findAll();

    foreach($menu as $rub) {

      $rub->pages =  $listePages->findBy(array("rubrique"=>$rub));

    }

    return $this->render('CUICoreBundle:Core:footer.html.twig', array(
          'menu'=>$menu,
          'nbrub'=>count($menu)
          ));
  }

  // La page d'accueil
  public function indexAction()
    {

      return $this->render('CUICoreBundle:Core:index.html.twig', array());

    }

}
