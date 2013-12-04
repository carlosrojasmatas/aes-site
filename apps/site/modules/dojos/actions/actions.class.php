<?php

/**
 * dojos actions.
 *
 * @package    aes
 * @subpackage dojos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dojosActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		
		$this->regions= Dojo::$regions;
		$this->selected= $request->getParameter("region");
		
		if(!$this->selected || $this->selected === "Argentina"){
			$this->selected= "Argentina";
			$this->pager= Dojo::getPager();
		}else{
			$this->pager= Dojo::getPager($this->selected);
		}
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();
		
		
		if($request->getParameter("ajax")){
			return $this->renderPartial("dojoList",array("pager"=>$this->pager));
		}
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new DojoForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid()){
				$dojo= Dojo::create($this->form);
				return $this->forward("dojos", "index");
			}
		}
	}
	
	public function executeDetail(sfWebRequest $request){
		$id= $request->getParameter("dojoId");
		if($id){
			$dojo= Dojo::getRepository()->find($id);
		}
		return $this->renderPartial("dojoDetail",array("dojo"=>$dojo));
	}
	
	public function executeFilterDojos(sfWebRequest $request){
		$region= $request->getParameter("region");
		if($region == "Argentina"){
			$this->dojos= Dojo::getRepository()->findAll(Doctrine::HYDRATE_ARRAY);  			
		}else{
			$this->dojos= Dojo::getRepository()->findByProvince($region);
		}
	}

}
