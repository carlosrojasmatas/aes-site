<?php

/**
 *
 * @package    aes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactForm extends BaseForm
{

	public function setup()
	{
		$this->setWidgets(array(
      'name'         => new sfWidgetFormInputText(),
      'comment'       => new sfWidgetFormTextarea(),
//      'captcha'   => new sfWidgetCaptchaGD(),
      'email'       => new sfWidgetFormInputText()
		));

		$this->setValidators(array(
	      	'name'       => new sfValidatorString(array("required"=>true)),
	      	'comment'   => new sfValidatorString(array("required"=>true)),
	      	'email' => new sfValidatorEmail(array("required"=>true))
//	    	'captcha' =>new sfCaptchaGDValidator()
		));

		$this->widgetSchema->setNameFormat('contact[%s]');

		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

		parent::setup();
	}



}
