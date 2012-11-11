<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeHelloBundle:Hello:index.html.twig', array('name' => $name));
    }
    
    public function anotherAction($id, $_controller, $_route)
    {
    	$msg = sprintf('<html><body>The id is %s (%s / %s)</body></html>', $id, $_controller, $_route);
    	return new Response($msg);
    }
}
