<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;

/**
 *@ORM\Entity
 *@ORM\Table(name="dojo")
 */
class Dojo extends UploadableEntity{
	
	
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
	 * @ORM\Column(type="string")
	 */
	protected $country;
	
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
	protected $order;
	
	 /**
     * @Assert\File(maxSize="300k")
     */
	protected $image;
	
	/**
	 * @ORM\Column(type="string",length=10)
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
     * @param string $country
     * @return Dojo
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
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
     * Set order
     *
     * @param integer $order
     * @return Dojo
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer 
     */
    public function getOrder()
    {
        return $this->order;
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
    
}
