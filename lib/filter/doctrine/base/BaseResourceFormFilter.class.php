<?php

/**
 * Resource filter form base class.
 *
 * @package    aes
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseResourceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'enabled' => 'enabled', 'disabled' => 'disabled'))),
      'parent_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Album'), 'add_empty' => true)),
      'extension'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'size'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'path'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'icon_path'      => new sfWidgetFormFilterInput(),
      'thumbnail_path' => new sfWidgetFormFilterInput(),
      'type'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'image' => 'image', 'video' => 'video'))),
      'sender'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'status'         => new sfValidatorChoice(array('required' => false, 'choices' => array('enabled' => 'enabled', 'disabled' => 'disabled'))),
      'parent_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Album'), 'column' => 'id')),
      'extension'      => new sfValidatorPass(array('required' => false)),
      'size'           => new sfValidatorPass(array('required' => false)),
      'path'           => new sfValidatorPass(array('required' => false)),
      'icon_path'      => new sfValidatorPass(array('required' => false)),
      'thumbnail_path' => new sfValidatorPass(array('required' => false)),
      'type'           => new sfValidatorChoice(array('required' => false, 'choices' => array('image' => 'image', 'video' => 'video'))),
      'sender'         => new sfValidatorPass(array('required' => false)),
      'city'           => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('resource_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resource';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'description'    => 'Text',
      'status'         => 'Enum',
      'parent_id'      => 'ForeignKey',
      'extension'      => 'Text',
      'size'           => 'Text',
      'path'           => 'Text',
      'icon_path'      => 'Text',
      'thumbnail_path' => 'Text',
      'type'           => 'Enum',
      'sender'         => 'Text',
      'city'           => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
