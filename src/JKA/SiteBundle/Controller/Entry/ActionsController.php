<?php

namespace JKA\SiteBundle\Controller\Entry;

use Admingenerated\JKASiteBundle\BaseEntryController\ActionsController as BaseActionsController;

/**
 * ActionsController
 */
class ActionsController extends BaseActionsController
{
	
	protected function executeObjectDelete(\JKA\SiteBundle\Entity\Entry $Entry)
	{
		$fs = $this->get("file.service");
		$this->get("logger")->info("Deleting entry with id " . $Entry->getId());
		$fs->deleteFile($Entry->getPath());
		parent::executeObjectDelete($Entry);
	}
	
}
