<?php

namespace JKA\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JKA\SiteBundle\Entity\Entry;
use JKA\SiteBundle\Form\Type\EntryType;

class EntryController extends Controller{


	public function indexNewsAction(){
		$entries =  $this->getDoctrine()->getRepository("JKASiteBundle:Entry")->findAll();
		return $this->render("JKASiteBundle:News:index.html.twig",array('entries' => $entries));
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