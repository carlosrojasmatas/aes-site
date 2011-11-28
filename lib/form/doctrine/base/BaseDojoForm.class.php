<?php

/**
 * Dojo form base class.
 *
 * @method Dojo getObject() Returns the current form's model object
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDojoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormTextarea(),
      'province'   => new sfWidgetFormTextarea(),
      'city'       => new sfWidgetFormTextarea(),
      'address'    => new sfWidgetFormTextarea(),
      'status'     => new sfWidgetFormChoice(array('choices' => array('enabled' => 'enabled', 'disabled' => 'disabled'))),
      'email'      => new sfWidgetFormTextarea(),
      'phone'      => new sfWidgetFormTextarea(),
      'sensei'     => new sfWidgetFormTextarea(),
      'photo'      => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(),
      'province'   => new sfValidatorString(),
      'city'       => new sfValidatorString(),
      'address'    => new sfValidatorString(),
      'status'     => new sfValidatorChoice(array('choices' => array(0 => 'enabled', 1 => 'disabled'))),
      'email'      => new sfValidatorString(),
      'phone'      => new sfValidatorString(),
      'sensei'     => new sfValidatorString(),
      'photo'      => new sfValidatorString(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('dojo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dojo';
  }

}
