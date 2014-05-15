<?php

namespace JKA\SiteBundle\Controller\Dojo;

use Admingenerated\JKASiteBundle\BaseDojoController\ActionsController as BaseActionsController;

/**
 * ActionsController
 */
class ActionsController extends BaseActionsController
{

	protected function executeObjectDelete(\JKA\SiteBundle\Entity\Dojo $dojo)
	{
		$fs = $this->get("file.service");
		$fs->deleteFile($dojo->getPath());
		parent::executeObjectDelete($dojo);
	}
}
