<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;

/**
 *@ORM\Entity
 *@ORM\Table(name="country")
 */
class Country {
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string",length=200)
	 */
	protected $name;
	/**
	 * @ORM\OneToMany(targetEntity="Location", mappedBy="country")
	 */
	protected $locations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Country
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * @return Country
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
     * Add locations
     *
     * @param \JKA\SiteBundle\Entity\Location $locations
     * @return Country
     */
    public function addLocation(\JKA\SiteBundle\Entity\Location $locations)
    {
        $this->locations[] = $locations;

        return $this;
    }

    /**
     * Remove locations
     *
     * @param \JKA\SiteBundle\Entity\Location $locations
     */
    public function removeLocation(\JKA\SiteBundle\Entity\Location $locations)
    {
        $this->locations->removeElement($locations);
    }

    /**
     * Get locations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocations()
    {
        return $this->locations;
    }
    
    public function __toString(){
    	return $this->getName();
    }
}
