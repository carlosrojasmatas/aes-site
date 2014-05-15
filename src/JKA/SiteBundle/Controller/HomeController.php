<?php

namespace JKA\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JKA\SiteBundle\Entity\Entry;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class HomeController extends Controller{

	public function homeAction($_format){

		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);
		$asArray = $_format=="json"?true:false;
		
		$em = $this->getDoctrine()->getManager();
		$entries =  $em->getRepository("JKASiteBundle:Entry")->findAll($asArray);
		$dojos =  $em->getRepository("JKASiteBundle:Dojo")->findAll($asArray);
		
		if ($_format== "json"){
			$json =$serializer->serialize(array("entries" => $entries,"dojos"=>$dojos),"json");
			$res = new Response($json);
		}else {
			$res = $this->render("JKASiteBundle:Home:home.html.twig",array('news' => $entries[Entry::$NEW],
					'events' => $entries[Entry::$EVENT],
					'insts' => $entries[Entry::$COMUNICATION],
					'dojos' => $dojos
			));
		}
		
		return $res;
	}
	
	public function aboutAction(){
		return $this->render("JKASiteBundle:Home:about.html.twig");
	}
}