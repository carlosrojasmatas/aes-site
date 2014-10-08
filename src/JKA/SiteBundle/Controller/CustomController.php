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

class CustomController extends Controller {
	
	public function indexNewsAction() {
		$entries = $this->get ( "repo.entry" )->findAll ();
		$dojos = $this->get ( "dojo.entry" )->findAll ();
		return $this->render ( "JKASiteBundle:News:index.html.twig", array (
				'news' => $entries [Entry::$NEW],
				'event' => $entries [Entry::$EVENT],
				'inst' => $entries [Entry::$COMUNICATION],
				'dojos' => $dojos 
		) );
	}
	
	public function detailAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entry = $em->getRepository ( "JKASiteBundle:Entry" )->find ( $id );
		
		return $this->render ( "JKASiteBundle:Entry:detail.html.twig", array (
				'entry' => $entry 
		) );
	}
	
	public function listEntriesAction($type, $_format, $region) {
		$encoders = array (
				new JsonEncoder () 
		);
		$normalizer = new GetSetMethodNormalizer ();
		
		$serializer = new Serializer ( array (
				$normalizer 
		), $encoders );
		
		$em = $this->getDoctrine ()->getManager ();
		
		$entries = $em->getRepository ( "JKASiteBundle:Entry" )->findByType ( $type );
		
		if ($_format == "json") {
			$viewEntries = array ();
			
			foreach ( $entries as $entry ) {
				$viewEntries += $entry->asViewObject ();
			}
			
			$json = $serializer->serialize ( array (
					"entries" => $viewEntries 
			), "json" );
			$res = new Response ( $json );
		} else {
			$res = $this->render ( "JKASiteBundle:Entry:index.html.twig", array (
					'entries' => $entries 
			) );
		}
		return $res;
	}
	
	
	public function listCommsAction() {
		$em = $this->getDoctrine ()->getManager ();
		$page = $this->getRequest ()->get ( "page", 1 );
		$paginator = $this->get ( "knp_paginator" );
		$comms = $em->getRepository ( "JKASiteBundle:Entry" )->entryPagination ( "com", $paginator, $page );
		return $this->render ( "JKASiteBundle:Entry:comms.html.twig", array (
				'pagination' => $comms 
		) );
	}
	
	public function createAction(Request $request) {
		$entry = new Entry ();
		$form = $this->createForm ( 'entry', $entry );
		
		if ($request->getMethod () == "POST") {
			$form->handleRequest ( $request );
			if ($form->isValid ()) {
				// here must be saved and set a flash
				
				$em = $this->getDoctrine ()->getManager ();
				$entry->upload ();
				
				$em->persist ( $entry );
				$em->flush ();
			}
		}
		
		return $this->render ( "JKASiteBundle:Entries:new.html.twig", array (
				'form' => $form->createView () 
		) );
	}
	
	public function listDojosAction(Request $request, $_format, $country,$city) {
		$encoders = array (
				new JsonEncoder () 
		);
		$normalizer = new GetSetMethodNormalizer ();
		
		$serializer = new Serializer ( array (
				$normalizer 
		), $encoders );
		
		$em = $this->getDoctrine ()->getManager ();
		$encoders = array (
				new JsonEncoder ()
		);
		$normalizer = new GetSetMethodNormalizer ();
		
		$serializer = new Serializer ( array (
				$normalizer
		), $encoders );
		if ($_format == "json") {
			$viewDojos = array ();
			$params=  array();
			
			if($country !== "ALL"){
				$params["country"]=$country ;
			}
			
			if($city !== "ALL"){
				$params["city"]=$city ;
			}
			
			$dojos = $em->getRepository ( "JKASiteBundle:Dojo" )->findBy ($params);
			
			foreach ( $dojos as $dojo ) {
				$viewDojos += $dojo->asViewObject ();
			}
			
			$json = $serializer->serialize ( array (
					"dojos" => $viewDojos
			), "json" );
			$res = new Response ( $json );
			
		} else {
			$page = $this->getRequest ()->get ( "page", 1 );
			$paginator = $this->get ( "knp_paginator" );
			$dojos = $em->getRepository ( "JKASiteBundle:Dojo" )->paginator($country,$city,$paginator,$page);
			
			$res = $this->render ( "JKASiteBundle:Entry:index.html.twig", array (
					'dojos' => $dojos
			) );
		}
		return $res;
	}
}