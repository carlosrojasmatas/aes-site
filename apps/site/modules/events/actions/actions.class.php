<?php

/**
 * events actions.
 *
 * @package    aes
 * @subpackage events
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventsActions extends sfActions
{


	public function executeIndex(sfWebRequest $request)
	{
		$this->form = new AdvertForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid())
			{
				$advert= Advert::create($this->form);
			}
		}

		$this->regions= Dojo::$regions;

		$this->pager= Advert::getMultiPager();
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();

	}

	public function executeShowDetails(sfWebRequest $request){
		$id= $request->getParameter("id");
		$this->advert= Advert::getRepository()->find($id);
	}
	
	


	public function executeFilterByRegion(sfWebRequest $request){
		$region= $request->getParameter("region");
		$year= $request->getParameter("year");
		$this->content=$this->buildEventWrappers(Advert::getRepository()->getEventsByRegion($region,$year));
		$this->setTemplate("json");
	}

	public function executeNew(sfWebRequest $request)
	
	{
		$this->form = new EventForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid())
			{
				$advert= Advert::create($this->form, Advert::EVENT);
			}
		}
		$this->forward("events", "index");
	}


	/**
	 * @deprecated
	 */
	public function executeFetchEvents(sfWebRequest $request){
		$month= $request->getParameter("month");
		if($month == 0){
			$pager= Advert::getEventPager();
		}else{
			$pager= Advert::getEventPager($month);
		}
		$pager->setPage($request->getParameter('page', 1));
		$pager->init();
		return $this->renderPartial("eventList",array("pager"=>$pager));
	}

	public function executeFetchEvents2(sfWebRequest $request){
		$year= $request->getParameter("year");
		$this->content=$this->buildEventWrappers(Advert::getRepository()->getEvents($year));
		$this->setTemplate("json");
	}


	private function buildEventWrappers($eventModel){
		$events= array();

		foreach ($eventModel as $eventKey => $event){
			$start= $event["start_date"];
			$end= $event["end_date"];
			$days = abs(strtotime($end) - strtotime($start)) / (60*60*24);
			sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url', 'Asset', 'Tag'));
			for($i=0;$i<=$days;$i++){
				$eventHolder["EventID"]= $i."-".$event["id"];
				$eventHolder["StartDateTime"]= date("Y-m-d"	, strtotime( "+".$i." days",strtotime($start)));
				$eventHolder["Title"]= $event["title"];
				$eventHolder["URL"]= url_for("news/showDetails")."?id=".$event["id"];
				$eventHolder["Description"]= $event["description"];
				$events[]=$eventHolder;
			}
		}
		return $events;
	}


	public function executeDelete(sfWebRequest $request){
		$id= $request->getPostParameter("eventId");
		Advert::getRepository()->find($id)->delete();
		$this->forward("events","index");
	}

	public function executeEventDetail(sfWebRequest $request){

		$id= $request->getParameter("id");
		$this->event= Advert::getRepository()->find($id);

	}


}
