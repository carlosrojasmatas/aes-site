<?php
namespace JKA\SiteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *@ORM\Entity
 *@ORM\Table(name="attachment")
 *
 */
class Attachment {
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string",length=100)
	 */
	private $path;
	
	/**
	 * @Assert\File(maxSize="300k")
	 */
	private $file;
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Entry", inversedBy="attachments")
	 * @ORM\JoinColumn(name="entry_id", referencedColumnName="id")
	 */
	
	private $entry;

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
     * Set path
     *
     * @param string $path
     * @return Attachment
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
     * Set entry
     *
     * @param \JKA\SiteBundle\Entity\Entry $entry
     * @return Attachment
     */
    public function setEntry(\JKA\SiteBundle\Entity\Entry $entry = null)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return \JKA\SiteBundle\Entity\Entry 
     */
    public function getEntry()
    {
        return $this->entry;
    }
}
