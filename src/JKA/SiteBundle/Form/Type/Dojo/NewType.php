<?php

namespace JKA\SiteBundle\Form\Type\Dojo;

use Admingenerated\JKASiteBundle\Form\BaseDojoType\NewType as BaseNewType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
/**
 * NewType
 */
class NewType extends BaseNewType
{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		parent::buildForm($builder, $options);
	
		$formOptions = $this->getFormOption('name', array(  'required' => true,  'label' => 'Nombre',  'translation_domain' => 'Admin',));
		$builder->add('name', 'text', $formOptions);
	
	
		$formOptions = $this->getFormOption('sensei', array(  'required' => true,  'label' => 'Profesor',  'translation_domain' => 'Admin',));
		$builder->add('sensei', 'text', $formOptions);
	
	
		$formOptions = $this->getFormOption('address', array(  'required' => true,  'label' => 'Direccion',  'translation_domain' => 'Admin',));
		$builder->add('address', 'text', $formOptions);
	
	
		$formOptions = $this->getFormOption('mail', array(  'required' => true,  'label' => 'Email',  'translation_domain' => 'Admin',));
		$builder->add('mail', 'text', $formOptions);
	
	
		$formOptions = $this->getFormOption('enabled', array(  'required' => false,  'label' => 'Aprobado',  'translation_domain' => 'Admin',));
		$builder->add('enabled', 'checkbox', $formOptions);
	
	
		$formOptions = $this->getFormOption('position', array(  'required' => true,  'label' => 'Orden',  'translation_domain' => 'Admin',));
		$builder->add('position', 'integer', $formOptions);
	
	
		$formOptions = $this->getFormOption('image', array( 'label' => 'Imagen','data_class'=> null));
		$builder->add('image', 'file', $formOptions);
		
	
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		parent::setDefaultOptions($resolver);
		$resolver->setDefaults(array(
				'data_class' => "JKA\SiteBundle\Entity\Dojo"
		));
	}
	
	
}
