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
		$this->pager= Advert::getEventPager();
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();
		$this->form = new EventForm();
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
