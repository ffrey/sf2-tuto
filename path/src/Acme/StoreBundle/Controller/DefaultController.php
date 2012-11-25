<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

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
	 * @Route("/create/{name}/{desc}/{price}")
	 * @Template
	 * @return Response
	 */
	public function createAction($name, $desc, $price)
	{
		$product = new Product();
		$product->setName($name);
		$product->setPrice($price);
		$product->setDescription($desc);
		$em = $this->getDoctrine()->getManager();
		$em->persist($product);
		$em->flush();
		return new Response('Created product id '.$product->getId());
	}

	/**
	 * @Route("/show/{id}", name="show_product")
	 * @Template
	 * @param unknown_type $id
	 * @return unknown_type
	 */
	public function showAction($id)
	{
		$repository = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product');

		$product = $repository->findOneById($id);

		return $this->render('AcmeStoreBundle:Default:show.html.twig', array('product' => $product));
		//		return new Response('Product :  '.serialize($product) );
	}

	/**
	 * @Route("/update/{id}/{desc}")
	 * @param unknown_type $id
	 * @param unknown_type $desc
	 * @return unknown_type
	 */
	public function updateAction($id, $desc)
	{
		$em = $this->getDoctrine()->getManager();
		$product = $em->getRepository('AcmeStoreBundle:Product')->find($id);
		if (!$product) {
			throw $this->createNotFoundException('No product found for id '.$id);
		}
		$product->setDescription($desc);
		$em->flush();
		return $this->redirect($this->generateUrl('show_product', array('id' => $id) ) );
	}

	/**
	 * @Route("/testDql")
	 * @Template
	 * @return unknown_type
	 */
	public function testDqlAction()
	{
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
'SELECT p FROM AcmeStoreBundle:Product p WHERE p.price > :price ORDER BY p.price ASC'
		)->setParameter('price', '19.99');
		$products = $query->getResult();
		
		return $this->render('AcmeStoreBundle:Default:list.html.twig', array('products' => $products));
	}
	
	/**
	 * @Route("/testBuilder")
	 * @return unknown_type
	 */
	public function testQuerybuilder()
	{
		$rep = $this->getDoctrine()
			->getRepository('AcmeStoreBundle:Product');
		
		$query = $rep->createQueryBuilder('p')
			->where('p.price > :price')
			->setParameter('price', '15')
			->orderBy('p.price')
			->getQuery();
		$products = $query->getResult();
		return $this->render('AcmeStoreBundle:Default:list.html.twig', array('products' => $products));
		
	}
}
