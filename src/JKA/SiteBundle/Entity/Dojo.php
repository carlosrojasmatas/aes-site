<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;
use JKA\SiteBundle\Entity\ViewObject;

/**
 *@ORM\Entity(repositoryClass="JKA\SiteBundle\Service\DojoRepository")
 *@ORM\Table(name="dojo")
 */
class Dojo extends UploadableEntity implements ViewObject{
	
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string",length=100)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string",length=200)
	 */
	protected $sensei;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $address;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $city;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Country", inversedBy="dojos")
	 * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
	 */
	protected $country;

	/**
	 * @ORM\ManyToOne(targetEntity="Location")
	 * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
	 */
	protected $location;
	
	/**
	 * @ORM\Column(type="text")
	 */
	protected $place;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $mail;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $enabled;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $position;
	
	 /**
     * @Assert\File(maxSize="300k")
     */
	protected $image;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $path;
	
	
    
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
     * @return Dojo
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
     * Set sensei
     *
     * @param string $sensei
     * @return Dojo
     */
    public function setSensei($sensei)
    {
        $this->sensei = $sensei;

        return $this;
    }

    /**
     * Get sensei
     *
     * @return string 
     */
    public function getSensei()
    {
        return $this->sensei;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Dojo
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Dojo
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param \JKA\SiteBundle\Entity\Country $country
     * @return Location
     */
    public function setCountry(\JKA\SiteBundle\Entity\Country $country)
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

    /**
     * Set mail
     *
     * @param string $mail
     * @return Dojo
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Dojo
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Dojo
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
    

    public function setImage($image){
    	$this->image = $image;
    }
    
    public function getImage(){
    	return $this->getResource();	
    }
    
    public function getResource(){
    	return $this->image;
    }
    

    /**
     * Set position
     *
     * @param integer $position
     * @return Dojo
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set place
     *
     * @param string $place
     * @return Dojo
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set location
     *
     * @param \JKA\SiteBundle\Entity\Location $location
     * @return Dojo
     */
    public function setLocation(\JKA\SiteBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \JKA\SiteBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }
    
	/* (non-PHPdoc)
	 * @see \JKA\SiteBundle\Entity\ViewObject::asViewObject()
	 */
	public function asViewObject() {
		return array(
			"name" => $this->getName(),
			"address"=>$this->getAddress()	
		);

	}

}
