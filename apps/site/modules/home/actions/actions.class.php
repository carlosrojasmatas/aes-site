<?php

/**
 * home
 *
 * @package    gmills
 * @subpackage auth
 * @author     Carlos
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
	public function executeHome(sfWebRequest $request){
		$this->news= Advert::getRepository()->getTopFive();	
		$this->events= Advert::getRepository()->getTopFive(Advert::EVENT);
		$this->albums= Album::getRepository()->getTopFive();
	}
	
	public function executeWhoWeAre($request){
			
	}
	
	public function executeContact($request){
		$this->form = new ContactForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid())
			{
				//send the email
				$this->getUser()->setFlash("contact_success", "Muchas gracias por sus comentarios!",false);
			}
		}
	}

	
}
