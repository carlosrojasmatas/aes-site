<?php

/**
 * albumResource module configuration.
 *
 * @package    aes
 * @subpackage albumResource
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class albumResourceGeneratorConfiguration extends BaseAlbumResourceGeneratorConfiguration
{
	function getFormClass(){
		return 'AdminAlbumResourceForm';
	}
}
