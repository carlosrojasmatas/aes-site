<?php

namespace JKA\SiteBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;
use JKA\SiteBundle\Entity\UploadableEntity;
use JKA\SiteBundle\Entity\Entry;
use JKA\SiteBundle\Entity\Dojo;
use Monolog\Logger;


class FileService {

	protected $fs;
	protected $logger;
	
	private static $SEO_PREFIX="jka_argentina";
	
	public function __construct(Logger $logger){
		$this->logger = $logger;
		$this->fs = new Filesystem();
	}
	
	private function save(UploadedFile $file,$rootDir){
		$name = uniqid(self::$SEO_PREFIX."_",true).".".$file->getClientOriginalExtension();
		$file->move($rootDir,$name);
		return $rootDir."/".$name;
	}
	
	private function rootDir(){
		return __DIR__.'/../../../../web/';
	}
	
	private function relativeDir(){
		return "uploads";
	}
	
	
	public function deleteFile($path){
		$this->logger->info("Deleting file".$this->rootDir().$path);
		$file = new File($this->rootDir().$path);
		$this->fs->remove(array($file));
	}
	
	public function uploadEntity(UploadableEntity $entity) {
		
		if (null != $entity->getResource()) {
			
			if($entity instanceof Entry){
				$path = $this->uploadEntryImage($entity->getResource());
				$fpath = $this->uploadEntryFrontImage($entity->getFrontImage());
				$entity->setFrontPath($fpath);
			}else if($entity instanceof Dojo){
				$path = $this->uploadDojoImage($entity->getResource());
			}else{
				$path = $this->uploadAlbumResource($entity->getResource());
			}
			$entity->setPath($path);
		
		}
	}
	
	public function uploadEntryImage(UploadedFile $file){
		return $this->save($file, $this->relativeDir()."/entries");
	}
	
	public function uploadEntryFrontImage(UploadedFile $file){
		return $this->save($file, $this->relativeDir()."/entries");
	}
		
	public function uploadDojoImage(UploadedFile $file){
		return $this->save($file, $this->relativeDir()."/dojos");
	}	
	public function uploadAlbumResource(UploadedFile $file){
		return $this->save($file, $this->relativeDir()."/albums");
	}	
	
	
}