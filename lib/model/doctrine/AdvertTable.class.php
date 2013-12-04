<?php

/**
 * AdvertTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdvertTable extends Doctrine_Table
{
	/**
	 * Returns an instance of this class.
	 *
	 * @return object AdvertTable
	 */
	public static function getInstance()
	{
		return Doctrine_Core::getTable('Advert');
	}

	public function getAllAdverts(){
		$query = Doctrine_Query::create()->
		addFrom("Advert a")
		->addWhere("type = ?",array("advert"))
		->addOrderBy("created_at DESC");
		return $query->execute();
	}
	public function getAllEvents(){
		$query = Doctrine_Query::create()->
		addFrom("Advert a")
		->addWhere("type = ?",array("event"))
		->addOrderBy("start_date ASC");
		return $query->execute();
	}
	
	public function getTop($nr,$type=null){
		$query = Doctrine_Query::create()->
		addFrom("Advert a")
		->addOrderBy("start_date DESC")
		->limit(5);
		
		if($type){
			$query->addWhere("a.type = ?",array($type));
//			$query->addWhere("a.start_date >= ?",array(date("Y-n-j")));
		}
		return $query->execute();
	}
	
	
	public function getEvents($year){
		 $q= Doctrine_Query::create()
			->addFrom("Advert a")
			->addWhere("type= :type",array("type"=>"event"))
			->addWhere("year(start_date) = :year",array("year"=>$year))
			->addOrderBy("start_date desc");
		return $q->execute(null,Doctrine::HYDRATE_ARRAY);		
	}
	
	public function getEventsByRegion($region,$year){
		
		 $q= Doctrine_Query::create()
			->addFrom("Advert a")
			->addWhere("type= :type",array("type"=>"event"))
			->addWhere("province = :province",array("province"=>$region))
			->addWhere("year(start_date) = :year",array("year"=>$year))
			->addOrderBy("start_date desc");
		
		return $q->execute(null,Doctrine::HYDRATE_ARRAY);		
	}
	
}