<?php

namespace JKA\SiteBundle\Controller\Entry;

use Admingenerated\JKASiteBundle\BaseEntryController\EditController as BaseEditController;
use JKA\SiteBundle\Service\FileService\FileService;

/**
 * EditController
 */
class EditController extends BaseEditController
{
	
	public function preSave(\Symfony\Component\Form\Form $form, \JKA\SiteBundle\Entity\Entry $entry){
		$fs = $this->get("file.service");

		if(Entry::$EVENT != $entry->getType()) {
			$df = new \DateTime('now');
			$entry->setStart($df);
			$entry->setEnd($df);
		}
	}
	
    protected function getAdditionalRenderParameters(\JKA\SiteBundle\Entity\Entry $Entry)
    {
        return array("image_path" => $Entry->getPath());
    }
	
		
}
