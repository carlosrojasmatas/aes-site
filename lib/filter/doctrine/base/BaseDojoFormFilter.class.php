<?php

/**
 * Dojo filter form base class.
 *
 * @package    aes
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDojoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'province'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'     => new sfWidgetFormChoice(array('choices' => array('' => '', 'enabled' => 'enabled', 'disabled' => 'disabled'))),
      'email'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sensei'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'province'   => new sfValidatorPass(array('required' => false)),
      'city'       => new sfValidatorPass(array('required' => false)),
      'address'    => new sfValidatorPass(array('required' => false)),
      'status'     => new sfValidatorChoice(array('required' => false, 'choices' => array('enabled' => 'enabled', 'disabled' => 'disabled'))),
      'email'      => new sfValidatorPass(array('required' => false)),
      'phone'      => new sfValidatorPass(array('required' => false)),
      'sensei'     => new sfValidatorPass(array('required' => false)),
      'photo'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('dojo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dojo';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'province'   => 'Text',
      'city'       => 'Text',
      'address'    => 'Text',
      'status'     => 'Enum',
      'email'      => 'Text',
      'phone'      => 'Text',
      'sensei'     => 'Text',
      'photo'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
