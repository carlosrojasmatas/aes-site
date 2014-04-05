<?php

namespace JKA\SiteBundle\Form\Type\Bo;

use Admingenerated\JKASiteBundle\Form\BaseBoType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
/**
 * EditType
 */
class EditType extends BaseEditType
{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
        $formOptions = $this->getFormOption('image', array( 'label' => 'Imagen','data_class'=> null));
        $builder->add('id', 'file', $formOptions);
        $formOptions = $this->getFormOption('description', array( 'label' => 'Descripcion', 'attr'=> array('class' => 'tinymce',
            'data-theme' => 'bbcode')));
        $builder->add('description', 'textarea', $formOptions);
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	parent::setDefaultOptions($resolver);
    	$resolver->setDefaults(array(
    			'data_class' => "JKA\SiteBundle\Entity\Entry"
    	));
    }
    
}
