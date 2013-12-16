<?php

class Shortandsel extends Doctrine_Migration_Base
{
  public function up()
  {
  	$this->addColumn("advert","shortDesc", "varchar",100,array("notnull"=>"1"));
  }

  public function down()
  {
  }
}
