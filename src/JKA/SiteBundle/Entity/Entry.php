<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;
use JKA\SiteBundle\Service\FileService\FileService;
/**
 *@ORM\Entity
 *@ORM\Table(name="entry")
 */
class Entry extends UploadableEntity{
	
	public static $COMUNICATION="com";
	public static $NEW="new";
	public static $EVENT="event";
	
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
	 * @ORM\Column(type="string",length=10)
	 */
	protected $type;
	
	/**
	 * @ORM\Column(type="string",length=100)
	 */
	protected $path;
		
	/**
	 * @ORM\Column(type="date")
	 */
	protected $start;

	/**
	 * @ORM\Column(type="date")
	 */
	protected $end;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $enabled;

	
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
}
