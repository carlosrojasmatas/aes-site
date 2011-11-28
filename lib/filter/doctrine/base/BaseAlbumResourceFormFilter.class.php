<?php

/**
 * AlbumResource filter form base class.
 *
 * @package    aes
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAlbumResourceFormFilter extends ResourceFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('album_resource_filters[%s]');
  }

  public function getModelName()
  {
    return 'AlbumResource';
  }
}
