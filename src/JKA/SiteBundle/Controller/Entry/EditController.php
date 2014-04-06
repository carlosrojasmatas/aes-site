<?php

namespace JKA\SiteBundle\Controller\Entry;

use Admingenerated\JKASiteBundle\BaseEntryController\EditController as BaseEditController;
use JKA\SiteBundle\Service\FileService\FileService;
use JKA\SiteBundle\Entity\Entry;

/**
 * EditController
 */
class EditController extends BaseEditController
{
	
	public function preSave(\Symfony\Component\Form\Form $form, Entry $entry){
		$fs = $this->get("file.service");

		if(Entry::$EVENT != $entry->getType()) {
			$df = new \DateTime('now');
			$entry->setStart($df);
			$entry->setEnd($df);
		}
	}
	
    protected function getAdditionalRenderParameters(Entry $Entry)
    {
        return array("image_path" => $Entry->getPath());
    }
	
		
}
