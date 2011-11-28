<?php

/**
 * albums actions.
 *
 * @package    aes
 * @subpackage albums
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class albumsActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->pager= Album::getPager();
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();
		$this->form= new AlbumForm();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new AlbumForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid())
			{
				$album= Album::create($this->form);
			}
		}
		$this->forward("albums", "index");
	}
	
	public function executeNewResource(sfWebRequest $request)
	{
		$type= $request->getPostParameter("type");
		$this->form = new AlbumResourceForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid())
			{
				$resource= AlbumResource::createNew($this->form,$type);
			}
		}
		$tainedValues= $this->form->getTaintedValues();
		$request->setParameter("albumId", $tainedValues["parent_id"]);
		$this->forward("albums", "showResources");
	}
	
	
	
	public function executeShowResources(sfWebRequest $request){
		if(!$this->form){
			$this->form= new AlbumResourceForm();
		}
		$albumId= $request->getParameter("albumId");
		$this->album= Album::getRepository()->findOneBy("id",$albumId);
		$this->type=$request->getParameter("type");
	}

	public function executeInsideAlbum(sfWebRequest $request){
		$type= $request->getParameter("type");
		$alId= $request->getParameter("album");
		$album= Album::getRepository()->find($alId);
		$this->resources= $album->getResourcesOfType($type);
	}

}
