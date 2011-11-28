<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	<div class="formRow">
		<div class="formLabel"><label for="signin_username">Usuario</label></div>
		<div class="formInput textfield"><?php echo $form["username"]->render();?><?php echo $form["username"]->renderError();?></div>
	</div>
	<div class="formRow">
		<div class="formLabel"><?php echo $form["password"]->renderLabel();?></div>
		<div class="formInput textfield"><?php echo $form["password"]->render();?></div>
	</div>
	<div class="formButtons">
          <input type="submit" value="<?php echo __('Ingresar', null, 'sf_guard') ?>" />
	</div>
	<a></a>
</form>