<?php

/**
 * Resource form.
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ResourceForm extends BaseResourceForm
{
  public function configure()
  {
  	$this->setWidget("path", new sfWidgetFormInputFile(array("label"=>"Seleccionar")));
  	$this->setValidator("path", new sfValidatorFile(array("required" => true, "max_size" => 3145728000)));
  	$this->useFields(array("path"));	
  }
}
