<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\StoreBundle\Entity\Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\StoreBundle\Entity\ProductRepository")
 */
class Product
{
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string $name
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var float $price
	 *
	 * @ORM\Column(name="price", type="float")
	 */
	private $price;

	/**
	 * @var string $description
	 *
	 * @ORM\Column(name="description", type="text")
	 */
	private $description;

	/**
	 * @var dateTime $created_at
	 *
	 * @ORM\Column(name="created_at", type="date")
	 */
	private $created_at;

	/**
	 * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
	 */
	protected $category;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return Product
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set price
	 *
	 * @param float $price
	 * @return Product
	 */
	public function setPrice($price)
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get price
	 *
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 * @return Product
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set category
	 *
	 * @param Acme\StoreBundle\Entity\Category $category
	 * @return Product
	 */
	public function setCategory(\Acme\StoreBundle\Entity\Category $category = null)
	{
		$this->category = $category;

		return $this;
	}

	/**
	 * Get category
	 *
	 * @return Acme\StoreBundle\Entity\Category
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * Set created_at
	 *
	 * @param dateTime $createdAt
	 * @return Product
	 */
	public function setCreatedAt(\dateTime $createdAt)
	{
		$this->created_at = $createdAt;

		return $this;
	}

	/**
	 * Get created_at
	 *
	 * @return dateTime
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}

	/**
	 * @TODO : cannot seem to be able to work properly ???
	 * @ORM\PrePersist
	 */
	public function setCreatedAtValue()
	{
		die(__METHOD__);
		$this->created_at = new \DateTime();
	}
}