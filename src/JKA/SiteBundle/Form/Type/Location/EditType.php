<?php

namespace JKA\SiteBundle\Form\Type\Location;

use Admingenerated\JKASiteBundle\Form\BaseLocationType\EditType as BaseEditType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * EditType
 */
class EditType extends BaseEditType
{
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		parent::setDefaultOptions($resolver);
		$resolver->setDefaults(array(
				'data_class' => "JKA\SiteBundle\Entity\Location"
		));
	}
}
