<?php

/**
 * Advert form.
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EventForm extends BaseAdvertForm
{
  public function configure()
  {
  	
  	$this->setWidget("main_image", new sfWidgetFormInputFile(array("label"=>"Seleccionar")));
  	$this->setWidget("f_image", new sfWidgetFormInputFile(array("label"=>"Seleccionar")));
  	$this->setWidget("title", new sfWidgetFormInputText());
  	$this->setWidget("place", new sfWidgetFormInputText());
  	$this->setWidget("description", new sfWidgetFormTextarea());
  	$this->setWidget("start_date", new sfWidgetFormInputText());
  	$this->setWidget("start_time", new sfWidgetFormInputText());
  	$this->setWidget("end_date", new sfWidgetFormInputText());
  	$this->setWidget("end_time", new sfWidgetFormInputText());
  	
  	$this->setValidator("main_image", new sfValidatorFile(array("required" => false, "max_size" => 2097152, "mime_types" => "web_images"), array("mime_types" => "Image should be jpeg png or gif.")));
  	$this->setValidator("f_image", new sfValidatorFile(array("required" => false, "max_size" => 2097152, "mime_types" => "web_images"), array("mime_types" => "Image should be jpeg png or gif.")));
//  	$this->setValidator("attachements", new sfValidatorSchemaForEach(new sfValidatorFile(array("required" => false, "max_size" => 2097152)), $this->MAX_ATTACHEMENTS));
  	$this->setValidator('start_date',new sfValidatorDate(array('required' => false)));
  	$this->setValidator('start_time',new sfValidatorString(array('required' => false)));
  	$this->setValidator('end_date',new sfValidatorDate(array('required' => false)));
  	$this->setValidator('end_time',new sfValidatorString(array('required' => false)));
  	$this->setValidator('place',new sfValidatorString(array('required' => false)));
  	$this->useFields(array("main_image","f_image","title","description","start_date","end_date","start_time","end_time","place"));
  }
}
