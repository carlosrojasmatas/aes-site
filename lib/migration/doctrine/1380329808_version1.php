<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version1 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('advert', 'type', 'enum', '11', array(
             'values' => 
             array(
              0 => 'advert',
              1 => 'event',
              2 => 'inst',
              3 => 'hombu',
             ),
             'notnull' => '1',
             ));
    }

    public function down()
    {

    }
}