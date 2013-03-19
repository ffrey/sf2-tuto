<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acme\StoreBundle\Entity\Product;
use Acme\StoreBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {
	/**
	 * @Route("/list")
	 * @Template()
	 */
	public function listAction() {
		$em = $this->getDoctrine()->getManager();
		$products = $em->getRepository('AcmeStoreBundle:Product')
				->findAllOrderedByName();
		$tplVars = array('products' => $products);
		return $this
				->render('AcmeStoreBundle:Default:list.html.twig', $tplVars);
	}

	/**
	 * @Route("/hello/{name}")
	 * @Template()
	 */
	public function indexAction($name) {
		return array('name' => $name);
	}

	/**
	 * @Route("/create/{name}/{desc}/{price}")
	 * @Template
	 * @return Response
	 */
	public function createAction($name, $desc, $price) {
		$category = new Category();
		$category->setName('Science Fiction');

		$product = new Product();
		$product->setName($name);
		$product->setPrice($price);
		$product->setDescription($desc);
		$product->setCategory($category);

		$em = $this->getDoctrine()->getManager();
		$em->persist($category);
		$em->persist($product);
		$em->flush();
		return new Response(
				'Created product id ' . $product->getId()
						. ' and category id is : ' . $category->getId());
	}

	/**
	 * @Route("/show/{id}", name="show_product")
	 * @Template
	 * @param unknown_type $id
	 * @return unknown_type
	 */
	public function showAction($id) {
		$db = false;
		$origin = __CLASS__ . '::' . __METHOD__;
		$repository = $this->getDoctrine()
				->getRepository('AcmeStoreBundle:Product');

		$product = $repository->findOneByIdJoinedToCategory($id);
		$category = $product->getCategory();
		if ($db) {
			var_dump($origin, 'product', get_class($product),
					'category true class', get_class($category));
			exit;
		}
		$category_name = $category->getName();
		$tplVars = array('product' => $product,
				'category_name' => $category_name,);
		return $this
				->render('AcmeStoreBundle:Default:show.html.twig', $tplVars);
		//		return new Response('Product :  '.serialize($product) );
	}

	/**
	 * @Route("/list/category/{id}")
	 */
	public function showCategoryAction($id) {
		$repository = $this->getDoctrine()
				->getRepository('AcmeStoreBundle:Category');

		$category = $repository->findOneById($id);

		$products = $category->getProducts();

		$tplVars = array('products' => $products, 'category' => $category,);
		return $this
				->render('AcmeStoreBundle:Default:listCategory.html.twig',
						$tplVars);
		//		return new Response('Product :  '.serialize($product) );
	}

	/**
	 * @Route("/update/{id}/{desc}")
	 */
	public function updateAction($id, $desc) {
		$em = $this->getDoctrine()->getManager();
		$product = $em->getRepository('AcmeStoreBundle:Product')->find($id);
		if (!$product) {
			throw $this
					->createNotFoundException('No product found for id ' . $id);
		}
		$product->setDescription($desc);
		$em->flush();
		return $this
				->redirect(
						$this->generateUrl('show_product', array('id' => $id)));
	}

	/**
	 * @Route("/testDql")
	 * @Template
	 * @return unknown_type
	 */
	public function testDqlAction() {
		$em = $this->getDoctrine()->getManager();
		$query = $em
				->createQuery(
						'SELECT p FROM AcmeStoreBundle:Product p WHERE p.price > :price ORDER BY p.price ASC')
				->setParameter('price', '19.99');
		$products = $query->getResult();

		return $this
				->render('AcmeStoreBundle:Default:list.html.twig',
						array('products' => $products));
	}

	/**
	 * @Route("/testBuilder")
	 * @return unknown_type
	 */
	public function testQuerybuilder() {
		$rep = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product');

		$query = $rep->createQueryBuilder('p')->where('p.price > :price')
				->setParameter('price', '15')->orderBy('p.price')->getQuery();
		$products = $query->getResult();
		return $this
				->render('AcmeStoreBundle:Default:list.html.twig',
						array('products' => $products));

	}
}
