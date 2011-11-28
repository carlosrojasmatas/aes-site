<?php

/**
 * Album form.
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlbumForm extends BaseAlbumForm
{
  public function configure()
  {
  	$this->setWidget("name", new sfWidgetFormInputText());
  	$this->setWidget("type",
  		new sfWidgetFormChoice(array('choices' => array('public' => 'publico', 'private' => 'privado'))));
  	$this->setValidator("name", new sfValidatorString(array("required"=>true)));
  	$this->setValidator('type',  new sfValidatorChoice(array('choices' => array(0 => 'public', 1 => 'private'))));
  	$this->useFields(array("name","type"));
  	
  	
  }
}
