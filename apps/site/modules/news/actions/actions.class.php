<?php

/**
 * news actions.
 *
 * @package    aes
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
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
		$this->pager= Advert::getNewsPager();
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new AdvertForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid())
			{
				$advert= Advert::create($this->form);
			}
		}
		$this->forward("news", "index");
			
	}

	public function executeShowDetails(sfWebRequest $request){
		$id= $request->getParameter("id");
		$this->advert= Advert::getRepository()->find($id);
	}

	public function executeDelete(sfWebRequest $request){
		$id= $request->getParameter("id");
		if($id){
			Advert::getRepository()->find($id)->delete();
		}
		$this->redirect("news/index", 200);
	}


}
