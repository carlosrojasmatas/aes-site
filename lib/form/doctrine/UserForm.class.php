<?php

/**
 * User form.
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
  	
  	$this->setWidget('username',new sfWidgetFormInputText());
  	$this->setWidget('password',new sfWidgetFormInputPassword());

    $this->setValidator("username", new sfValidatorString(array("required"=>true)));
    $this->setValidator("password", new sfValidatorString(array("required"=>true)));
    
    $this->useFields(array("username","password"));
  }
}
