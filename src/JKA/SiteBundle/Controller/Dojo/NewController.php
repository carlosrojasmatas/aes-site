<?php

namespace JKA\SiteBundle\Controller\Dojo;

use Admingenerated\JKASiteBundle\BaseDojoController\NewController as BaseNewController;
use JKA\SiteBundle\Entity\Dojo;

/**
 * NewController
 */
class NewController extends BaseNewController
{
	
	public function preSave(\Symfony\Component\Form\Form $form, Dojo $dojo){
		$fs = $this->get("file.service");
		$fs->uploadEntity($dojo);
	}
}
