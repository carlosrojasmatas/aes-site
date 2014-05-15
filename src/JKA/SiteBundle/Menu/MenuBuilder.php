<?php
namespace JKA\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Admingenerator\GeneratorBundle\Menu\AdmingeneratorMenuBuilder;


class MenuBuilder extends AdmingeneratorMenuBuilder {
	
	
	public function mainMenu(FactoryInterface $factory, array $options){
		
		$menu = $factory->createItem("root");
		$menu->setChildrenAttributes(array('id' => 'main_navigation', 'class' => 'nav'));
		$menu->addChild('Entradas', array('route' => 'JKA_SiteBundle_Entry_list'));
		
		$menu->addChild('Dojos', array('route' => 'JKA_SiteBundle_Dojo_list'));
		$menu->addChild('Albums', array('route' => 'JKA_SiteBundle_Album_list'));
		$menu->addChild('Fotos y videos', array('route' => 'JKA_SiteBundle_Resource_list'));
		$menu->addChild('Paises', array('route' => 'JKA_SiteBundle_Country_list'));
		$menu->addChild('Localidades', array('route' => 'JKA_SiteBundle_Location_list'));
		
		
		return $menu;

     }
}