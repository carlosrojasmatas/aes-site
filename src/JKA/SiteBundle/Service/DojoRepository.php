<?php

namespace JKA\SiteBundle\Service;

use Doctrine\ORM\EntityRepository;
use JKA\SiteBundle\Entity\Dojo;
use Doctrine\ORM\Query;
use Monolog\Logger;

class DojoRepository extends EntityRepository {
	
	
	public function findAll($asArray = false) {
		return $this->getEntityManager ()->createQuery ( "select d from JKASiteBundle:Dojo d" )->getResult ( $asArray ? Query::HYDRATE_ARRAY : Query::HYDRATE_OBJECT );
	}
	
	public function byCountryAndCity($country,$city, $paginator, $page, $limit = 5) {
		$qb = $this->getEntityManager ()->createQueryBuilder ();
		$qb->add ( "select", "e" )->from ( "JKASiteBundle:Dojo", "d" );
		echo $country;
		if($country !== 'ALL') {
			$qb->andWhere ( "e.country = :country" )
			->setParameter ( "country", $country );
		}
		
		if($city !== 'ALL'){
			$qb->andWhere ( "e.city = :city" )
			->setParameter ( "city", $city);
		}
		
		var_dump($qb->getDQL());
		$pagination = $paginator->paginate ( $qb->getQuery (), $page, $limit );
		return $pagination;
	}
}