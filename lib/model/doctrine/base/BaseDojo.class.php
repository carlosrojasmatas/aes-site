<?php

/**
 * BaseDojo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $province
 * @property string $city
 * @property string $address
 * @property enum $status
 * @property string $email
 * @property string $phone
 * @property string $sensei
 * @property string $photo
 * 
 * @method integer getId()       Returns the current record's "id" value
 * @method string  getName()     Returns the current record's "name" value
 * @method string  getProvince() Returns the current record's "province" value
 * @method string  getCity()     Returns the current record's "city" value
 * @method string  getAddress()  Returns the current record's "address" value
 * @method enum    getStatus()   Returns the current record's "status" value
 * @method string  getEmail()    Returns the current record's "email" value
 * @method string  getPhone()    Returns the current record's "phone" value
 * @method string  getSensei()   Returns the current record's "sensei" value
 * @method string  getPhoto()    Returns the current record's "photo" value
 * @method Dojo    setId()       Sets the current record's "id" value
 * @method Dojo    setName()     Sets the current record's "name" value
 * @method Dojo    setProvince() Sets the current record's "province" value
 * @method Dojo    setCity()     Sets the current record's "city" value
 * @method Dojo    setAddress()  Sets the current record's "address" value
 * @method Dojo    setStatus()   Sets the current record's "status" value
 * @method Dojo    setEmail()    Sets the current record's "email" value
 * @method Dojo    setPhone()    Sets the current record's "phone" value
 * @method Dojo    setSensei()   Sets the current record's "sensei" value
 * @method Dojo    setPhoto()    Sets the current record's "photo" value
 * 
 * @package    aes
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDojo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dojo');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('province', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('city', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('address', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('status', 'enum', 11, array(
             'type' => 'enum',
             'length' => 11,
             'values' => 
             array(
              0 => 'enabled',
              1 => 'disabled',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('email', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('phone', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('sensei', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('photo', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}