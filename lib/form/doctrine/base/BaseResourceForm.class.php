<?php

/**
 * Resource form base class.
 *
 * @method Resource getObject() Returns the current form's model object
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseResourceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormTextarea(),
      'description'    => new sfWidgetFormTextarea(),
      'status'         => new sfWidgetFormChoice(array('choices' => array('enabled' => 'enabled', 'disabled' => 'disabled'))),
      'parent_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Album'), 'add_empty' => false)),
      'extension'      => new sfWidgetFormTextarea(),
      'size'           => new sfWidgetFormInputText(),
      'path'           => new sfWidgetFormTextarea(),
      'icon_path'      => new sfWidgetFormTextarea(),
      'thumbnail_path' => new sfWidgetFormTextarea(),
      'type'           => new sfWidgetFormChoice(array('choices' => array('image' => 'image', 'video' => 'video'))),
      'sender'         => new sfWidgetFormTextarea(),
      'city'           => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(),
      'description'    => new sfValidatorString(),
      'status'         => new sfValidatorChoice(array('choices' => array(0 => 'enabled', 1 => 'disabled'))),
      'parent_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Album'))),
      'extension'      => new sfValidatorString(),
      'size'           => new sfValidatorPass(),
      'path'           => new sfValidatorString(),
      'icon_path'      => new sfValidatorString(array('required' => false)),
      'thumbnail_path' => new sfValidatorString(array('required' => false)),
      'type'           => new sfValidatorChoice(array('choices' => array(0 => 'image', 1 => 'video'))),
      'sender'         => new sfValidatorString(),
      'city'           => new sfValidatorString(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('resource[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resource';
  }

}
