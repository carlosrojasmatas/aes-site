<?php

/**
 * AlbumResource form.
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdminAlbumResourceForm extends BaseAlbumResourceForm
{
  /**
   * @see ResourceForm
   */
  public function configure()
  {
    parent::configure();
    $this->setWidget("name", new sfWidgetFormInputText());
    $this->setWidget("description", new sfWidgetFormInputText());
    $this->setWidget("sender", new sfWidgetFormInputText());
    $this->setWidget("city", new sfWidgetFormInputText());
    $this->setWidget("path", new sfWidgetFormInputText());
    $this->setWidget("parent_id", new sfWidgetFormInputHidden());
     $this->setWidget('status',  new sfWidgetFormChoice(array('choices'=>array("enabled"=>"Aceptado","disabled"=>"No aprobado")))) ;	
    $this->widgetSchema['path']->setAttribute('readonly','readonly');
    $this->widgetSchema['parent_id']->setAttribute('readonly','readonly');

  	$this->setValidator("description",new sfValidatorString(array("required"=>true)));
  	$this->setValidator("sender",new sfValidatorString(array("required"=>true)));
  	$this->setValidator("name",new sfValidatorString(array("required"=>true)));
  	$this->setValidator('status',new sfValidatorString(array('required' => false)));
  	$this->setValidator('path',new sfValidatorString(array('required' => false)));
  	$this->setValidator("city",new sfValidatorString(array("required"=>true)));
  	$this->setValidator("parent_id",new sfValidatorString(array("required"=>false)));
  	$this->useFields(array("name","description","parent_id","path","sender","city","status"));
  }
}
