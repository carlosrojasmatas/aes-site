<?php

class Addprovince extends Doctrine_Migration_Base
{
  public function up()
  {
  	$this->addColumn("advert","province", "varchar",40,array("notnull"=>"1"));
    }

  public function down()
  {
  	$this->removeColumn("advert","province");
  }
}
