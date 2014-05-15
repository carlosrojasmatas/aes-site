<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;

/**
 *@ORM\Entity
 *@ORM\Table(name="location")
 */
class Location {
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="text")
	 */
	protected $name;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Country", inversedBy="locations")
	 * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
	 */
	protected $country;
    

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
     * @return Location
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
     * Set country
     *
     * @param \JKA\SiteBundle\Entity\Country $country
     * @return Location
     */
    public function setCountry(\JKA\SiteBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \JKA\SiteBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    public function __toString() {
    	return $this->name;
    }
    
}
