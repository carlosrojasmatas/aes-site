<?php

/**
 * Dojo form.
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdminDojoForm extends BaseDojoForm
{
  public function configure()
  {
    $this->setWidget('name',  new sfWidgetFormInputText()) ;	 
    $this->setWidget('province',  new sfWidgetFormChoice(array('choices' => Dojo::$regions))) ;	 
    $this->setWidget('city',  new sfWidgetFormInputText()) ;	 
    $this->setWidget('address',  new sfWidgetFormInputText()) ;	 
    $this->setWidget('email',  new sfWidgetFormInputText()) ;	 
    $this->setWidget('phone',  new sfWidgetFormInputText()) ;	 
    $this->setWidget('sensei',  new sfWidgetFormInputText()) ;	 
    $this->setWidget('status',  new sfWidgetFormChoice(array('choices'=>array("enabled"=>"Aceptado","disabled"=>"No aprobado")))) ;	 
    $this->setWidget('photo',  new sfWidgetFormInputFile(array("label"=>"Seleccionar"))) ;	 
	$this->setWidget('captcha',new sfWidgetCaptchaGD());    
  	
	$this->setValidator("photo", new sfValidatorFile(array("required" => false, "max_size" => 2097152, "mime_types" => "web_images"), array("mime_types" => "Image should be jpeg png or gif.")));
  	$this->setValidator('captcha',new sfCaptchaGDValidator());
  	$this->setValidator('status',new sfValidatorString(array('required' => false)));
  	$this->setValidator('email',new sfValidatorEmail());
  	
	$this->useFields(array("name","province","city","address","email","phone","sensei","photo","status"));
  	
  }
}
