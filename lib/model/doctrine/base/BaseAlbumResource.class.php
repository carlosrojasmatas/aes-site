<?php

/**
 * BaseAlbumResource
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Album $Parent
 * 
 * @method Album         getParent() Returns the current record's "Parent" value
 * @method AlbumResource setParent() Sets the current record's "Parent" value
 * 
 * @package    aes
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAlbumResource extends Resource
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Album as Parent', array(
             'local' => 'parent_id',
             'foreign' => 'id'));
    }
}