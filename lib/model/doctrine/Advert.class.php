<?php

/**
 * Advert
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    aes
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Advert extends BaseAdvert
{

	const ADVERT= "advert";
	const EVENT= "event";
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
	 * @return AdvertTable
	 */
	public static function getRepository(){
		return Doctrine::getTable(__CLASS__);
	}


	public static function create(BaseAdvertForm $form){
		$advert= new Advert();
		$advert->modify($form);
		$advert->save();
		$advert->saveImage($form);
		$advert->saveFrontImage($form);
		foreach ($form->getValue("attachements") as $attachement){
			if($attachement){
				$this->addResource($attachement);
			}
		}
		return $advert;
	}

	public function modify(BaseAdvertForm $data){
		$this->setDescription($data->getValue("description"));
		$this->setTitle($data->getValue("title"));
		$this->setType($data->getValue("type"));
		if($this->getType() == self::EVENT){
			$this->setStartDate($data->getValue("start_date"));
			$this->setStartTime($data->getValue("start_time"));
			$this->setEndDate($data->getValue("end_date"));
			$this->setEndTime($data->getValue("end_time"));
			$this->setPlace($data->getValue("place"));

		}
	}

	public function getImage(){
		return $this->getImagePath() . $this->getImageName();
	}

	public function getFImage(){
		return $this->getFImagePath() . $this->getFImageName();
	}

	//	public function saveResizedImage(){
	//		$path = sfConfig::get("app_resource_upload").$this->getId()."/";
	//		$small = new sfImage($path.$this->getImageName());
	//		$extension= substr($this->getImageName(), strpos($this->getImageName(), "."));
	//		$fullName= substr($this->getImageName(), 0,strpos($this->getImageName(), "."))."_resized".$extension;
	//		$small->thumbnail(300, 240);
	//		$small->saveAs($path.$fullName);
	//		$this->setResizedImagePath($this->getMainImagePath().$fullName);
	//	}

	//	public function saveIconImage(){
	//		$path = sfConfig::get("app_resource_upload").$this->getId()."/";
	//		$small = new sfImage($path.$this->getImageName());
	//		$extension= substr($this->getImageName(), strpos($this->getImageName(), "."));
	//		$fullName= substr($this->getImageName(), 0,strpos($this->getImageName(), "."))."_icon".$extension;
	//		$small->thumbnail(80, 80);
	//		$small->saveAs($path.$fullName);
	//		$this->setIconImagePath($this->getMainImagePath().$fullName);
	//	}

	public function saveImage($form){
		if($form->getValue("image")){
			$imageFile= $form->getValue("image");
			$imageName=$imageFile->generateFileName();
			$imagePath=sfConfig::get("app_resource_upload").$this->getId();
			if(!file_exists($imagePath)){
				mkdir($imagePath,0777);
			}
			$imageFile->save($imagePath."/".$imageName);
			$this->setImagePath("/uploads/resources/".$this->getId()."/");
			$this->setImageName($imageName);
			$this->save();
		}
	}

	public function saveFrontImage($form){
		if($form->getValue("f_image")){
			$imageFile= $form->getValue("f_image");
			$imageName=$imageFile->generateFileName();
			$imagePath=sfConfig::get("app_resource_upload").$this->getId();
			if(!file_exists($imagePath)){
				mkdir($imagePath,0777);
			}
			$imageFile->save($imagePath."/".$imageName);
			$this->setFImagePath("/uploads/resources/".$this->getId()."/");
			$this->setFImageName($imageName);
			$this->save();
		}
	}



	public function addResource(sfValidatedFile $resource){
		$resource = Resource::createNew($this, $resource);
		$this->save();
	}

	public static function getEventPager($month=false){
		if($month){
			$q= Doctrine_Query::create()
			->addFrom("Advert a")
			->addWhere("type= :type",array("type"=>"event"))
			->addWhere("month(start_date) = :month OR month(end_date)= :month",array("month"=>$month));
		}else{
			$q=Doctrine_Query::create()
			->from("Advert a")
			->addWhere("a.type= 'event'");
		}
		$q->addOrderBy("start_date DESC");
		$pager=new sfDoctrinePager("Advert",4);
		$pager->setQuery($q);
		return $pager;
	}

	public static function getNewsPager($month=false){
		if($month){
			$q= Doctrine_Query::create()
			->addFrom("Advert a")
			->addWhere("month(start_date) = :month OR month(end_date)= :month",array("month"=>$month));
		}else{
			$q=Doctrine_Query::create()
			->from("Advert a");
		}
		$q->addOrderBy("start_date DESC");
		$pager=new sfDoctrinePager("Advert",4);
		$pager->setQuery($q);
		return $pager;
	}

	public function getStartPreformattedDate(){
		list($year, $month, $day) = preg_split('[-]', $this->getStartDate());
		$date= $day." de ".$this->months[$month];
		return $date;
	}

	public function getEndPreformattedDate(){
		list($year, $month, $day) = preg_split('[-]', $this->getEndDate());
		$date= $day." de ".$this->months[$month];
		return $date;
	}

}
