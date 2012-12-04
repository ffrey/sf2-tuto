<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acme\BlogBundle\Entity\Author;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Email;

class BlogController extends Controller
{
	/**
	 * @Route("/validate", name="_blog_validation")
	 * @Template()
	 */
	public function indexAction()
	{
		$author = new Author();
		// ... do something to the $author object
		$validator = $this->get('validator');
		$author->gender = 'hello';
		$errors = $validator->validate($author);
		
		$emailConstraint = new Email();
		// all constraint "options" can be set this way
		$emailConstraint->message = 'Invalid email address';
		// use the validator to validate the value
		$errorList = $this->get('validator')->validateValue('ljk', $emailConstraint);
		foreach ($errorList AS $error) {
			$errors[] = $error;
		}
		if (count($errors) > 0) {
			return $this->render('AcmeBlogBundle:Blog:validate.html.twig', array(
				'errors' => $errors,
			));
		} else {
			return new Response('The author is valid! Yes!');
		}
	}
	
	/**
	 * @Route("/", name="_blog_accueil")
	 * @Template()
	 */
	public function listAction($_controller, $_route)
	{
		$db = true; $origin = __CLASS__.'::'.__METHOD__;
		if ($db) {
			var_dump($_controller, $_route);
		}
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
