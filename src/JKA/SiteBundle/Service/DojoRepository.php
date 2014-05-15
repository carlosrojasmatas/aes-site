<?php

namespace JKA\SiteBundle\Service;

use Doctrine\ORM\EntityRepository;
use JKA\SiteBundle\Entity\Entry;
use Doctrine\ORM\Query;

class DojoRepository extends EntityRepository{
	
	
	public function findAll($asArray = false){
		return $this->getEntityManager()->createQuery("select d from JKASiteBundle:Dojo d")->getResult($asArray?Query::HYDRATE_ARRAY:Query::HYDRATE_OBJECT);
	}
	
}