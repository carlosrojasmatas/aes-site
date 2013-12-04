<?php

/**
 * Advert form.
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdvertForm extends BaseAdvertForm
{
	private $MAX_ATTACHEMENTS= 5;
  public function configure()
  {
  	
  	$this->setWidget("image", new sfWidgetFormInputFile(array("label"=>"Seleccionar")));
  	$this->setWidget("f_image", new sfWidgetFormInputFile(array("label"=>"Seleccionar")));
  	$this->setWidget("title", new sfWidgetFormInputText());
  	$this->setWidget("description", new sfWidgetFormTextarea());
  	$this->setWidget("place", new sfWidgetFormInputText());
  	$this->setWidget("start_date", new sfWidgetFormInputText());
  	$this->setWidget("start_time", new sfWidgetFormInputText());
  	$this->setWidget("end_date", new sfWidgetFormInputText());
  	$this->setWidget("end_time", new sfWidgetFormInputText());
  	$this->setWidget("type",new sfWidgetFormChoice(array('choices' => array('advert' => 'Noticia', 'event' => 'Evento','inst' => 'Institucional','hombu' => 'Hombu'))));
  	$this->setWidget("province",new sfWidgetFormChoice(array('choices' => Dojo::$regions)));
  	
  	
  	
  	$this->setValidator("image", new sfValidatorFile(array("required" => false, "max_size" => 2097152, "mime_types" => "web_images"), array("mime_types" => "Image should be jpeg png or gif.")));
  	$this->setValidator("f_image", new sfValidatorFile(array("required" => false, "max_size" => 2097152, "mime_types" => "web_images"), array("mime_types" => "Image should be jpeg png or gif.")));
  	$this->setValidator("attachements", new sfValidatorSchemaForEach(new sfValidatorFile(array("required" => false, "max_size" => 2097152)), $this->MAX_ATTACHEMENTS));
  	$this->setValidator('start_date',new sfValidatorDate(array('required' => true)));
  	$this->setValidator('start_time',new sfValidatorString(array('required' => false)));
  	$this->setValidator('end_date',new sfValidatorDate(array('required' => true)));
  	$this->setValidator('end_time',new sfValidatorString(array('required' => false)));
  	$this->setValidator('place',new sfValidatorString(array('required' => false)));
  	$this->setValidator('title',new sfValidatorString(array('required' => true)));
  	$this->setValidator('type',new sfValidatorString(array('required' => true)));
  	$this->setValidator('description',new sfValidatorString(array('required' => true)));
  	$this->setValidator('province',new sfValidatorString(array('required' => true)));
  	$this->setValidator("attachements", new sfValidatorSchemaForEach(new sfValidatorFile(array("required" => false, "max_size" => 2097152)), $this->MAX_ATTACHEMENTS));
  	
  	
  	$this->useFields(array("image","f_image","title","description","type","start_date","end_date","start_time","end_time","place","province"));
  	
  }
}
