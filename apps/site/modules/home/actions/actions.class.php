<?php

/**
 * home
 *
 * @author     Carlos
 */
class homeActions extends sfActions
{
	
	public function executeHome(sfWebRequest $request){
		$this->news= Advert::getRepository()->getTop(5,"home");	
		$this->events= Advert::getRepository()->getTop(5,Advert::EVENT);
		$this->insts= Advert::getRepository()->getTop(5,Advert::INST);
		$this->hombus= Advert::getRepository()->getTop(5,Advert::HOMBU);
		$this->albums= Album::getRepository()->getTopFive();
		$this->dojos= Dojo::getRepository()->getTop(5);
	}
	
	public function executeAbout($request){
			
	}
	
	public function executeContact($request){
		$this->form = new ContactForm();
		if($request->getMethod() == sfRequest::POST){
			$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
			if ($this->form->isValid())
			{ 
				//send the email
				$comment = $this->form->getValue('comments');
				$from = $this->form->getValue('email');
				$name = $this->form->getValue('name');
				
				$mailer= sfContext::getInstance()->getMailer();
				sfContext::getInstance()->getLogger()->info("Sending mail from ".$from." to info@jka-argentina.com.ar");
				$mailer->composeAndSend("info@jka-argentina.com.ar", "info@jka-argentina.com.ar", "Comentario de ".$name." usando [".$from."]", $comment);
				$this->getUser()->setFlash("contact_success", "Muchas gracias por sus comentarios!",false);
			}
		}
	}

	
}
