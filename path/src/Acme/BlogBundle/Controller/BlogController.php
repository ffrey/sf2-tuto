<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller
{
	/**
	 * @Route("/", name="_blog_accueil")
	 * @Template()
	 */
	public function listAction()
	{

		$posts = array ( 
					0 => array ( 'id' => '1', 'title' => 'Pride and prejudice', ), 
					1 => array ( 'id' => '2', 'title' => 'Les raisins de la colere', ), 
		); 

		return $this->render('AcmeBlogBundle:Blog:list.html.twig', array('result' => $posts));
	}

	/**
	 * @Route("/show", name="_blog_show")
	 * @Template()
	 */
	public function showAction()
	{
		$post = array ( 'id' => '1', 'title' => 'Pride and prejudice', );

		if (!$post) {
			// cause the 404 page not found to be displayed
			throw $this->createNotFoundException();
		}

		return $this->render('AcmeBlogBundle:Blog:show.html.twig', array('post' => $post) );
	}

}
