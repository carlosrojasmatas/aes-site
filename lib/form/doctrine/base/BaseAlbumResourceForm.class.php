<?php

/**
 * AlbumResource form base class.
 *
 * @method AlbumResource getObject() Returns the current form's model object
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAlbumResourceForm extends ResourceForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('album_resource[%s]');
  }

  public function getModelName()
  {
    return 'AlbumResource';
  }

}
