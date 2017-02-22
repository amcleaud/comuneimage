<?php

namespace CUI\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use CUI\ContactBundle\Entity\Message;
use CUI\ContactBundle\Form\MessageType;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
    	$message =  new Message();
    	$form = $this->createForm(MessageType::class, $message);

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {

    		$message = $form->getData();
    		$mail = \Swift_Message::newInstance()
	            ->setSubject('Com\' une image - Vous avez reçu un nouveau message !')
	            ->setFrom($message->getEmail())
	            ->setTo($this->container->getParameter('app_contact_mail'))
	            ->setBody($this->renderView('CUIContactBundle:Contact:contactEmail.txt.twig', array('message' => $message)));
	        $this->get('mailer')->send($mail);

	        $this->addFlash('success', 'Votre message nous a été transmis. Merci !');

            return $this->redirectToRoute('cui_contact_index');
	    }

        return $this->render('CUIContactBundle:Contact:index.html.twig', array('form' => $form->createView()));
    }
}
