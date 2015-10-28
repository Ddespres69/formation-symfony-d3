<?php

namespace ParkBundle\Entity;

class Computer
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
	protected $ip;

	/*
	 * @var Person
	 */
	protected $person;

	/*
	 * @var boolean
	 */
	protected $enabled;

	/*
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/*
	 * Set ip
	 *
	 * @param string $ip
	 * @return Computer
	 */
	public function setIp($ip) {
		$this->ip = $ip;

		return $this;
	}

	/*
	 * Get ip
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/*
	 * Set name
	 *
	 * @param string $name
	 * @return Computer
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/*
	 * Get ip
	 *
	 * @return string
	 */
	public function getIp() {
		return $this->ip;
	}

	/*
	 * Set person
	 *
	 * @param Person $person
	 * @return Person
	 */
	public function setPerson($person) {
		$this->person = $person;

		return $this;
	}

	/*
	 * Get person
	 *
	 * @return Person
	 */
	public function getPerson() {
		return $this->person;
	}

	/*
	 * Set enabled
	 *
	 * @param boolean $enabled
	 * @return Computer
	 */
	public function setEnabled($enabled) {
		$this->enabled = $enabled;

		return $this;
	}

	/*
	 * Is enabled
	 *
	 * @return boolean
	 */
	public function isEnabled() {
		return $this->enabled;
	}

	/*
	 * To string
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->getName();
	}
}