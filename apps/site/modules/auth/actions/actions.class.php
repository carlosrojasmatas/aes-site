<?php

/**
 * auth actions.
 *
 * @package    aes
 * @subpackage auth
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authActions extends sfActions
{
	
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogin(sfWebRequest $request){
  	$this->form= new UserForm();
  	if($request->getMethod()== sfRequest::POST){
	  	$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
	  	if($this->form->isValid()){
	  		$user= sfGuardUserTable::getInstance()->retrieveByUsername($this->form->getValue("username"));
	  		if($user && $user->checkPassword($this->form->getValue("password"))){
	  			$this->getUser()->addCredential("admin");
			    $this->redirect('home/home');
	  		}else{
	  		   $this->getUser()->setFlash("login_not_valid", "Usuario/Password no validos.");
	  		}
	  	}
  	}
  	
  	$this->setLayout(false);
  }
  
  public function executeLogout(sfWebRequest $request){
  	$this->getUser()->removeCredential("admin");
  	$this->redirect("home/home");
  }
}
