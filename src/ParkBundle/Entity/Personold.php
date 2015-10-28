<?php

namespace ParkBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ParkBundle\Entity\Computer;

class Person
{
	/*
	 * @var integer
	 */
	protected $id;

	/*
	 * @var string
	 */
	protected $name;

	/*
	 * @var string
	 */
	protected $firstname;

	/*
	 * @var ArrayCollection
	 */
	protected $computers;

	/*
	 * Get id
	 *
	 * @return integer
	 */
	public function __toString() {
		return sprintf("%s %s", $this->getName(), $this->getFirstname());
	}

	/*
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/*
	 * Set name
	 *
	 * @param string $name
	 * @return Person
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/*
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/*
	 * Set firstname
	 *
	 * @param string $firstname
	 * @return Person
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;

		return $this;
	}

	/*
	 * Get firstname
	 *
	 * @return string
	 */
	public function getFirstname() {
		return $this->firstname;
	}


	/*
	 * Set computers
	 *
	 * @param string $name
	 * @return Person
	 */
	public function setComputers(ArrayCollection $computers) {
		$this->computers = $computers;

		return $this;
	}

	/*
	 * Get computers
	 *
	 * @return ArrayCollection
	 */
	public function getComputers() {
		return $this->computers;
	}

	/*
	 * Add computer
	 *
	 * @param Computer $computer
	 * @return Person
	 */
	public function addComputer(Computer $computer) {
		$this->computers[] = $computer;

		return $this;
	}

	/*
	 * Add computer
	 *
	 * @param Computer $computer
	 * @return Person
	 */
	public function removeComputer(Computer $computer) {

		$this->computers->removeElement($computer);
		return $this;
	}
}