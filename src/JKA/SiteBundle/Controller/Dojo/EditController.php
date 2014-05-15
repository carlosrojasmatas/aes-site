<?php

namespace JKA\SiteBundle\Controller\Dojo;

use Admingenerated\JKASiteBundle\BaseDojoController\EditController as BaseEditController;
use JKA\SiteBundle\Entity\Dojo;

/**
 * EditController
 */
class EditController extends BaseEditController
{
	
	public function preSave(\Symfony\Component\Form\Form $form, Dojo $dojo){
		$fs = $this->get("file.service");
		$fs->uploadEntity($dojo);
	}
	
	protected function getAdditionalRenderParameters(Dojo $dojo)
	{
		return array("image_path" => $dojo->getPath());
	}
}
