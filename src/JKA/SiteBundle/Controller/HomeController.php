<?php

namespace JKA\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller{
	
	public function homeAction(){
		return $this->render('JKASiteBundle:Home:home.html.twig',
							 array("news" => array(),
							 		"insts"=>array(),
							 		"events"=>array(),
		)
							);
	}
}