<?php
namespace JKA\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntryType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder
		->add("title","text",array("label" => "Titulo"))
		->add("shortDescription","text",array("label" => "Resumen"))
		->add("description","text",array("label" => "Descripcion"))
		->add("type","text",array("label" => "Tipo"))
		->add("image","file",array("label" => "Imagen"))
		->add("save","submit");
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver){
		$resolver->setDefaults(array('data_class' => 'JKA\SiteBundle\Entity\Entry'));
	}
	
	public function getName(){
		return "entry";
	}
	
}