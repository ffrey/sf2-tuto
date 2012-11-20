<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
	/**
	 * @Route("/hello/{name}", name="_store_accueil")
	 * @Template()
	 */
	public function helloAction($name, $_controller, $_route)
	{
		$db = false; $origin = __CLASS__.'::'.__METHOD__;
		if ($db) {
			var_dump($name, $_controller, $_route);
		}

		return new Response(sprintf('hello %s from store', $name) );
//		return $this->render('AcmeBlogBundle:Blog:list.html.twig', array('result' => $posts));
	}

	
}
