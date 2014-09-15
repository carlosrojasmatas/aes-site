<?php

namespace JKA\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;
use JKA\SiteBundle\Entity\ViewObject;

/**
 *@ORM\Entity(repositoryClass="JKA\SiteBundle\Service\EntryRepository")
 *@ORM\Table(name="entry")
 *
 */
class Entry extends UploadableEntity implements ViewObject{
	
	public static $COMUNICATION="com";
	public static $NEW="new";
	public static $EVENT="event";
	
	private $months =array("01"=>"Enero",
			"02"=>"Febrero",
			"03"=>"Marzo",
			"04"=>"Abril",
			"05"=>"Mayo",
			"06"=>"Junio",
			"07"=>"Julio",
			"08"=>"Agosto",
			"09"=>"Septiembre",
			"10"=>"Octubre",
			"11"=>"Noviembre",
			"12"=>"Diciembre",
	);
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string",length=100)
	 */
	protected $title;
	
	/**
	 * @ORM\Column(type="string",length=200)
	 */
	protected $shortDescription;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;
	
	/**
     * @Assert\File(maxSize="300k")
     */
	protected $image;
	
	/**
     * @Assert\File(maxSize="300k")
     */
	protected $frontImage;
	
	/**
	 * @ORM\Column(type="string",length=10)
	 */
	protected $type;
	
	/**
	 * @ORM\Column(type="string",length=100)
	 */
	protected $path;
		
	/**
	 * @ORM\Column(type="string",length=100)
	 */
	protected $frontPath;
		
	/**
	 * @ORM\Column(type="date")
	 */
	protected $start;

	/**
	 * @ORM\Column(type="date")
	 */
	protected $end;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Country")
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
	 * @ORM\Column(type="boolean")
	 */
	protected $enabled;
	
	/**
	 * @var datetime $created
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(type="datetime")
	 */
	protected $created;
	
	public function getCreated()
	{
		return $this->created;
	}
	
		
	public function setId($id){
		$this->id=$id;
		
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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Post
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Post
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
     * Set image
     *
     * @param UploadedFile $image
     * @return Post
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return UploadedFile 
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Set front image
     *
     * @param UploadedFile $frontImage
     * @return Post
     */
    public function setFrontImage($image)
    {
        $this->frontImage = $image;

        return $this;
    }

    /**
     * Get front image
     *
     * @return UploadedFile 
     */
    public function getFrontImage()
    {
        return $this->frontImage;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Post
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Entry
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
    
    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Entry
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Entry
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Entry
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
    
    public function getResource() {
    	return $this->getImage();
    }

    /**
     * Set place
     *
     * @param string $place
     * @return Entry
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
     * Set country
     *
     * @param \JKA\SiteBundle\Entity\Country $country
     * @return Entry
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
    
    public function getCountryAsString(){
    	return $this->country->__toString();
    }

    /**
     * Set location
     *
     * @param \JKA\SiteBundle\Entity\Location $location
     * @return Entry
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

    
    public function getStartPreformattedDate(){
    	return $this->formatDate($this->getStart());
    }
    
    public function getEndPreformattedDate(){
    	return $this->formatDate($this->getEnd());
    }
    
    public function getFCreated(){
    	return $this->formatDate($this->getCreated());
    }
    
    private function formatDate($date) {
    	list($year, $month, $day) = preg_split('[-]', $date->format("Y-m-d"));
    	$fdate= $day." de ".$this->months[$month]." de ".$year;
    	return $fdate;
    	 
    }
    

    /**
     * Set frontPath
     *
     * @param string $frontPath
     * @return Entry
     */
    public function setFrontPath($frontPath)
    {
        $this->frontPath = $frontPath;

        return $this;
    }

    /**
     * Get frontPath
     *
     * @return string 
     */
    public function getFrontPath()
    {
    	if(!$this->frontPath) {
    		return $this->path;
    	}
        return $this->frontPath;
    }
    
    public function __toString() {
    	return $this->title;
    }
    
    public function asViewObject() {
    	
    	return array(
    		"title" => $this->title,
    		"shortDescription" => $this->shortDescription,
    		"path" => $this->frontPath,
    		"from" => $this->getStartPreformattedDate(),
    		"to" => $this->getEndPreformattedDate()
    			
    	);
    }
}
