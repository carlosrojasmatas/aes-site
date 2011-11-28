<?php

/**
 * BaseNew
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $image_id
 * @property Doctrine_Collection $Files
 * @property Image $Image
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getTitle()       Returns the current record's "title" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method integer             getImageId()     Returns the current record's "image_id" value
 * @method Doctrine_Collection getFiles()       Returns the current record's "Files" collection
 * @method Image               getImage()       Returns the current record's "Image" value
 * @method New                 setId()          Sets the current record's "id" value
 * @method New                 setTitle()       Sets the current record's "title" value
 * @method New                 setDescription() Sets the current record's "description" value
 * @method New                 setImageId()     Sets the current record's "image_id" value
 * @method New                 setFiles()       Sets the current record's "Files" collection
 * @method New                 setImage()       Sets the current record's "Image" value
 * 
 * @package    aes
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNew extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('new');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('title', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('image_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('File as Files', array(
             'local' => 'file_id',
             'foreign' => 'parent_id'));

        $this->hasOne('Image', array(
             'local' => 'image_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}