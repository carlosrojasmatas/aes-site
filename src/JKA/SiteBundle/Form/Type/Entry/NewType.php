<?php

namespace JKA\SiteBundle\Form\Type\Entry;

use Admingenerated\JKASiteBundle\Form\BaseEntryType\NewType as BaseNewType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * NewType
 */
class NewType extends BaseNewType
{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		parent::buildForm($builder, $options);
		
		$formOptions = $this->getFormOption('image', array('required' => false, 'label' => 'Imagen','data_class'=> null));
		$builder->add('image', 'file', $formOptions);

		$formOptions = $this->getFormOption('frontImage', array('required' => false, 'label' => 'Imagen Frontal','data_class'=> null));
		$builder->add('frontImage', 'file', $formOptions);
		
		$formOptions = $this->getFormOption('description', array( 'label' => 'Descripcion', 'attr'=> array('class' => 'tinymce',
				'data-theme' => 'bbcode')));
		
		$builder->add('description', 'textarea', $formOptions);
			
		$formOptions = $this->getFormOption('type', array( 'label' => 'Tipo de entrada', 'choices'=> array("new"=>"Noticia","event"=>"Evento","com"=>"Comunicacion") ));
		$builder->add('type', 'choice', $formOptions);

		$formOptions = $this->getFormOption('start', array(  'required' => false,  'label' => 'Start',  'translation_domain' => 'Admin',));
		$builder->add('start', 'datetime', $formOptions);
		
		$formOptions = $this->getFormOption('end', array(  'required' => false,  'label' => 'End',  'translation_domain' => 'Admin',));
		$builder->add('end', 'datetime', $formOptions);

		$formOptions = $this->getFormOption('enabled', array(  'required' => false,  'label' => 'Publicado', 'data' => isset($options['data']) ? $options['data']->getEnabled() : false));
		$builder->add('enabled', 'checkbox', $formOptions);
		
		$formOptions = $this->getFormOption('place', array(  'required' => false,  'label' => 'Lugar'));
		$builder->add('place', 'text', $formOptions);
		
		$formOptions = $this->getFormOption('path', array(  'required' => false,  'label' => 'Path principal'));
		$builder->add('path', 'text', $formOptions);
		
		$formOptions = $this->getFormOption('frontPath', array(  'required' => false,  'label' => 'Path frontal'));
		$builder->add('frontPath', 'text', $formOptions);
		
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		parent::setDefaultOptions($resolver);
		$resolver->setDefaults(array(
				'data_class' => "JKA\SiteBundle\Entity\Entry"
		));
	}
}
