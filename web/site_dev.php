<?php

// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
ini_set('memory_limit','256M');
$configuration = ProjectConfiguration::getApplicationConfiguration('site', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
