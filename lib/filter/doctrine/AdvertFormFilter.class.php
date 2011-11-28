<?php

/**
 * Advert filter form.
 *
 * @package    aes
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdvertFormFilter extends BaseAdvertFormFilter
{
  public function configure()
  {
  	
  	
  	$this->setWidget('start_date',new sfWidgetFormFilterDate(array(
  						'from_date' => new sfWidgetFormDate(), 
  						'to_date' => new sfWidgetFormDate(),
  						'with_empty'=>false,
  						'template' => 'Desde: %from_date% - Hasta: %to_date%')));
  	$this->setWidget('end_date',new sfWidgetFormFilterDate(array(
  						'from_date' => new sfWidgetFormDate(), 
  						'to_date' => new sfWidgetFormDate(),
  						'with_empty'=>false,
  						'template' => 'Desde: %from_date% - Hasta: %to_date%')));
  	$this->setWidget('place',new sfWidgetFormFilterInput(array(
  						'with_empty'=>false)));
  }
}
