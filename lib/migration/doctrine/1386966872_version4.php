<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version4 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('advert', 'ismain', 'boolean', '25', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('advert', 'shortdesc');
        $this->removeColumn('advert', 'ismain');
    }
}