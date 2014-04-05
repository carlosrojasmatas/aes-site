<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;

/**
 *@ORM\Entity
 *@ORM\Table(name="album_resource")
 */
class AlbumResource extends UploadableEntity{
	
	private static $TYPES=array('photo','video');
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string",length=100)
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="string",length=200)
	 */
	protected $sender;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $enabled;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $type;
	
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $url;
	
	 /**
     * @Assert\File(maxSize="300k")
     */
	protected $resource;
	
	/**
	 * @ORM\Column(type="string",length=10)
	 */
	protected $path;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Album", inversedBy="resources")
	 * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
	 */
	protected $album;
	
	
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
     * Set description
     *
     * @param string $description
     * @return AlbumResource
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
     * Set sender
     *
     * @param string $sender
     * @return AlbumResource
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return string 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return AlbumResource
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
     * Set type
     *
     * @param string $type
     * @return AlbumResource
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
     * Set url
     *
     * @param string $url
     * @return AlbumResource
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return AlbumResource
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
     * Set album
     *
     * @param \JKA\SiteBundle\Entity\Album $album
     * @return AlbumResource
     */
    public function setAlbum(\JKA\SiteBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \JKA\SiteBundle\Entity\Album 
     */
    public function getAlbum()
    {
        return $this->album;
    }
    
    
    public function setResource($resource){
    	$this->resource = $resource;
    }

    public function getResource(){
    	return $this->resource;
    }
    
}
