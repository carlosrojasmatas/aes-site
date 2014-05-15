<?php

namespace JKA\SiteBundle\Service;

use Doctrine\ORM\EntityRepository;
use JKA\SiteBundle\Entity\Entry;
use Doctrine\ORM\Query;

class EntryRepository extends EntityRepository{
	
	
	public function findAll($asArray=false){
		$rs = $this->getEntityManager()->createQuery("select e from JKASiteBundle:Entry e")->getResult($asArray?Query::HYDRATE_ARRAY:Query::HYDRATE_OBJECT);
		$news = array();
		$inst = array();
		$event = array();
		
		foreach($rs as $r){
			$t = $asArray?$r["type"]:$r->getType();
			if($t == Entry::$NEW){
				$news[] = $r;
			}else if ($t == Entry::$COMUNICATION){
				$inst[] = $r;
			}else {
				$event[] = $r;
			}
		}
		
		return array(Entry::$NEW => $news,Entry::$COMUNICATION => $inst, Entry::$EVENT => $event);
	}
	
}