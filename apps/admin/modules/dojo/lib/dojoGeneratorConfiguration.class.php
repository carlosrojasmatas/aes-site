<?php

/**
 * dojo module configuration.
 *
 * @package    aes
 * @subpackage dojo
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dojoGeneratorConfiguration extends BaseDojoGeneratorConfiguration
{
/**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'AdminDojoForm';
  }
}
