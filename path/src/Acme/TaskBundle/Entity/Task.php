<?php

// src/Acme/TaskBundle/Entity/Task.php
namespace Acme\TaskBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
class Task {
	/**
	 * TODO : 2013 03 18 : ne fonctionne pas...
	 * @Assert\MinLength(
	 *   limit=3,
	 *   message="Title should have at least {{ limit }} characters."
	 * )
	 */
	protected $task;
	protected $dueDate;

	/**
	 * @Assert\Type(type="Acme\TaskBundle\Entity\Category")
	 */
	protected $category;
	// ...
	public function getCategory() {
		return $this->category;
	}

	public function setCategory(Category $category = null) {
		$this->category = $category;
	}

	public function getTask() {
		return $this->task;
	}
	public function setTask($task) {
		$this->task = $task;
	}
	public function getDueDate() {
		return $this->dueDate;
	}
	public function setDueDate(\DateTime $dueDate = null) {
		$this->dueDate = $dueDate;
	}
}
