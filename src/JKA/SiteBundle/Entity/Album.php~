<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;

/**
 *@ORM\Entity
 *@ORM\Table(name="album")
 */
class Album {
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string",length=200)
	 */
	protected $name;
	/**
	 * @ORM\Column(type="date",length=100)
	 */
	protected $date;
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $enabled;
	
	/**
	 * @ORM\OneToMany(targetEntity="AlbumResource", mappedBy="album")
	 */
	protected $resources;
	
	public function __construct()
	{
		$this->resources = new ArrayCollection();
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
     * @return Album
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
     * Set date
     *
     * @param \DateTime $date
     * @return Album
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Album
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
     * Add resources
     *
     * @param \JKA\SiteBundle\Entity\AlbumResource $resources
     * @return Album
     */
    public function addResource(\JKA\SiteBundle\Entity\AlbumResource $resources)
    {
        $this->resources[] = $resources;

        return $this;
    }

    /**
     * Remove resources
     *
     * @param \JKA\SiteBundle\Entity\AlbumResource $resources
     */
    public function removeResource(\JKA\SiteBundle\Entity\AlbumResource $resources)
    {
        $this->resources->removeElement($resources);
    }

    /**
     * Get resources
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResources()
    {
        return $this->resources;
    }
}
