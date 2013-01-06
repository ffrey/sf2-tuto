<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
	 * @Route("/hello/{name}")
	 * @Template()
	 */
	public function indexAction($name)
	{
		return array('name' => $name);
	}

	/**
	 * @Route("/new", name="task_new")
	 * @Template()
	 */
	public function newAction(Request $request)
	{
		// create a task and give it some dummy data for this example
		$task = new Task();
		$task->setTask('Write a blog post');
		$task->setDueDate(new \DateTime('tomorrow'));
// 		$form = $this->createFormBuilder($task)
// 		->add('task', 'text')
// 		->add('dueDate', null, array(
// 				// 'widget' => 'single_text', 
// 				'label' => 'date objectif')
// 		)
// 		->getForm();
		$form = $this->createForm(new TaskType(), $task);
		
		if ($request->isMethod('POST')) {
			$form->bind($request);
			if ($form->isValid()) {
				$request->getSession()->getFlashBag()->add('notice', 'Yep, we have treated your request ;-p');
				// perform some action, such as saving the task to the database
				return $this->redirect($this->generateUrl('task_success'));
			}
		}
		
		return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
				'form' => $form->createView(),
		));
	}
	
	/**
	 * @Route("/show", name="task_success")
	 * @Template
	 * @param Request $request
	 */
	public function showAction(Request $request)
	{
		
	}
}
