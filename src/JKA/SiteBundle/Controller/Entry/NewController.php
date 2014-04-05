<?php

namespace JKA\SiteBundle\Controller\Entry;

use Admingenerated\JKASiteBundle\BaseEntryController\NewController as BaseNewController;
use JKA\SiteBundle\Entity\Entry;

/**
 * NewController
 */
class NewController extends BaseNewController
{

	private static $DEFAULT_FORMAT="Y-m-d";

	public function preSave(\Symfony\Component\Form\Form $form, \JKA\SiteBundle\Entity\Entry $entry){
		
		if(Entry::$EVENT != $entry->getType()) {
			$df = new \DateTime('now');
			$entry->setStart($df);
			$entry->setEnd($df);
		}
		
		$fs = $this->get("file.service");
		$fs->uploadEntity($entry);
	}

}
