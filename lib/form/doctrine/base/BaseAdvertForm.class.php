<?php

/**
 * Advert form base class.
 *
 * @method Advert getObject() Returns the current form's model object
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAdvertForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'title'              => new sfWidgetFormTextarea(),
      'description'        => new sfWidgetFormTextarea(),
      'start_date'         => new sfWidgetFormDate(),
      'end_date'           => new sfWidgetFormDate(),
      'start_time'         => new sfWidgetFormTextarea(),
      'end_time'           => new sfWidgetFormTextarea(),
      'place'              => new sfWidgetFormTextarea(),
      'type'               => new sfWidgetFormChoice(array('choices' => array('advert' => 'advert', 'event' => 'event'))),
      'main_image_path'    => new sfWidgetFormTextarea(),
      'image_name'         => new sfWidgetFormTextarea(),
      'resized_image_path' => new sfWidgetFormTextarea(),
      'icon_image_path'    => new sfWidgetFormTextarea(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'              => new sfValidatorString(),
      'description'        => new sfValidatorString(),
      'start_date'         => new sfValidatorDate(array('required' => false)),
      'end_date'           => new sfValidatorDate(array('required' => false)),
      'start_time'         => new sfValidatorString(array('required' => false)),
      'end_time'           => new sfValidatorString(array('required' => false)),
      'place'              => new sfValidatorString(array('required' => false)),
      'type'               => new sfValidatorChoice(array('choices' => array(0 => 'advert', 1 => 'event'))),
      'main_image_path'    => new sfValidatorString(),
      'image_name'         => new sfValidatorString(),
      'resized_image_path' => new sfValidatorString(),
      'icon_image_path'    => new sfValidatorString(),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('advert[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advert';
  }

}
