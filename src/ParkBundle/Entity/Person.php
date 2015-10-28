<?php

namespace ParkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ParkBundle\Entity\PersonRepository")
 */
class Person
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\OneToMany(targetEntity="ParkBundle\Entity\Customer", mappedBy="person")
     * @ORM\JoinColumn(nullable=true)
     */
    private $computers;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->computers = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString() {
        return sprintf("%s %s", $this->getName(), $this->getFirstname());
    }

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
     * @return Person
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
     * Set firstname
     *
     * @param string $firstname
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param Computer $computer
     * @return $this
     */
    public function addComputer(Computer $computer)
    {
        $this->computers[] = $computer;

        return $this;
    }

    /**
     * @param Computer $computer
     */
    public function removeComputer(Computer $computer)
    {
        $this->computers->removeElement($computer);
    }

    /**
     * @return mixed
     */
    public function getComputers()
    {
        return $this->computers;
    }
}
