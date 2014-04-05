<?php

namespace JKA\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Console\Application;
use JKA\SiteBundle\Service\FileService\FileService;

abstract class UploadableEntity {
	
	public function removeResource(){
		$this->fileService->deleteFile($this->getPath());
	}
    
    /**
     * @return UploadedFile
     * */
    public abstract function  getResource();
    
    public abstract function setPath($path);
	
    public abstract function getPath();

}
