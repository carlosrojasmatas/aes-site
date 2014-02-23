<?php

/**
 * DojoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DojoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object DojoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Dojo');
    }
    
    public function getTop($nr){
    	$query = Doctrine_Query::create()->
		addFrom("Dojo d")
		->addOrderBy("created_at DESC")
		->limit($nr);
		
		return $query->execute();
    }
    
    public function findByProvince($province){
    	$query = Doctrine_Query::create()
    			->from("Dojo d")
    			->addWhere("d.province=?",array($province));
    	return $query->execute(array(),Doctrine::HYDRATE_ARRAY);
    			
    }
}