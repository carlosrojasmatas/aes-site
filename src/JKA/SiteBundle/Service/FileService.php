<?php

namespace JKA\SiteBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;
use JKA\SiteBundle\Entity\UploadableEntity;
use JKA\SiteBundle\Entity\Entry;
use JKA\SiteBundle\Entity\Dojo;


class FileService {

	protected $fs;
	private static $SEO_PREFIX="jka_argentina";
	
	public function __construct(){
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
		$file = new File(rootDir().$path);
		$this->fs->remove(array($file));
	}
	
	public function uploadEntity(UploadableEntity $entity){
		if($entity->getPath() != null) {
			$this->deleteFile($entity->getPath());
		}
		
		if (null != $entity->getResource()){
			if($entity instanceof Entry){
				$path = $this->uploadEntryImage($entity->getResource());
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
		
	public function uploadDojoImage(UploadedFile $file){
		return $this->save($file, $this->relativeDir()."/dojos");
	}	
	public function uploadAlbumResource(UploadedFile $file){
		return $this->save($file, $this->relativeDir()."/albums");
	}	
	
	
}