<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
	/**
	 * @Route("/", name="_demo")
	 * @Template()
	 */
	public function indexAction()
	{
		return array();
	}

	/**
	 * @Route("/hello/{name}.{_format}", defaults={"_format"="html"}, name="_demo_hello",
	 requirements={"_format"="html|xml|json"})
	 * @Template()
	 */
	public function helloAction($name)
	{
		$db = false; $origin = __CLASS__.'::'.__METHOD__;
		if (true) {
			$name = 'redirectMan';
			$url = $this->generateUrl('_demo_fancy', array('name' => $name) );
			if ($db) {
				var_dump($origin
						, 'url', $url
						, 'stop !'); exit;
			}
			$session = $this->getRequest()->getSession();
			$session->getFlashBag()->add('notice', 'Congratulations, your redirect succeeded!');
			return $this->redirect($url);
		} else if (true) {
			$name = 'forwardMan';
			$response = $this->forward('AcmeDemoBundle:Demo:fancy', array('name' => $name, 'color' =>
					'green'));
			return $response;
		} else {
			return array('name' => $name);
		}
	}

	/**
	 * @Route("/contact", name="_demo_contact")
	 * @Template()
	 */
	public function contactAction()
	{
		$form = $this->get('form.factory')->create(new ContactType());

		$request = $this->get('request');
		if ('POST' == $request->getMethod()) {
			$form->bindRequest($request);
			if ($form->isValid()) {
				$mailer = $this->get('mailer');
				// .. setup a message and send it
				// http://symfony.com/doc/current/cookbook/email.html

				$this->get('session')->setFlash('notice', 'Message sent!');

				return new RedirectResponse($this->generateUrl('_demo'));
			}
		}

		return array('form' => $form->createView());
	}

	/**
	 * @Route("/fancy", name="_demo_fancy")
	 */
	public function fancyAction($name = null)
	{
		$db = false; $origin = __CLASS__.'::'.__METHOD__;
		if ($db) {
			var_dump($origin
					, 'stop !'); exit;
		}
		$name = $this->getRequest()->query->get('name');
		$name = ($name)? $name : 'bonjour';
		return $this->render('AcmeDemoBundle:Demo:fancy.html.twig',
				array('name' => $name,)
		);
	}
}
