<?php

namespace JKA\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JKA\SiteBundle\Entity\Entry;
use JKA\SiteBundle\Form\Type\EntryType;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class EntryController extends Controller{


	public function indexNewsAction(){
		$entries =  $this->get("repo.entry")->findAll();
		$dojos =  $this->get("dojo.entry")->findAll();
		return $this->render("JKASiteBundle:News:index.html.twig",array('news' => $entries[Entry::$NEW],
																		'event' => $entries[Entry::$EVENT],
																		'inst' => $entries[Entry::$COMUNICATION],
																		'dojos' => $dojos
		));
	}
	
	public function detailAction($id){
		$em = $this->getDoctrine()->getManager();
		
		$entry =  $em->getRepository("JKASiteBundle:Entry")->find($id);
		
		return $this->render("JKASiteBundle:Entry:detail.html.twig",array('entry' => $entry));
	}
	
	public function listEntriesAction($type,$_format,$region) {
		
		$encoders = array(new JsonEncoder());
		$normalizer = new GetSetMethodNormalizer();
		
		$normalizer->setCallbacks(array('start'=>$dateCallback));
		
		$serializer = new Serializer(array($normalizer), $encoders);
		
		$em = $this->getDoctrine()->getManager();
		
		$entries =  $em->getRepository("JKASiteBundle:Entry")->findByType($type);

		if ($_format== "json"){
			$viewEntries = array();
			
			foreach ($entries as $entry){
				$viewEntries += $entry->asViewObject();
			}
			
			$json =$serializer->serialize(array("entries" => $viewEntries),"json");
			$res = new Response($json);
		}else {
			$res = $this->render("JKASiteBundle:Entry:index.html.twig",array('entries' => $entries));
		}
		return $res;
	}
	
	public function listCommsAction(){
		$em = $this->getDoctrine()->getManager();
		$comms =  $em->getRepository("JKASiteBundle:Entry")->findByType("com");
		return $this->render("JKASiteBundle:Entry:comms.html.twig",array('comms' => $comms));
	}

	public function createAction(Request $request){
		$entry = new Entry();
		$form = $this->createForm('entry',$entry);


		if($request->getMethod() == "POST") {
			$form->handleRequest($request);
			if($form->isValid()){
				//here must be saved and set a flash

				$em = $this->getDoctrine()->getManager();
				$entry->upload();

				$em->persist($entry);
				$em->flush();

			}
		}
		
		return $this->render("JKASiteBundle:Entries:new.html.twig",array(
				'form'=>$form->createView(),
		));

	}

}