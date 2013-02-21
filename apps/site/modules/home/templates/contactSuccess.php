<?php echo use_stylesheet("contact.css")?>

<div class="section-header" style="background: white url(/images/contact-banner.png) repeat-x 0 0 scroll;">
</div>
<div id="new-form" >

	<form class="contact-form" method="post" enctype="multipart/form-data" action="<?php echo url_for("home/contact")?>">
		<?php if (sfContext::getInstance()->getUser()->hasFlash("contact_success")): ?>
    		<p class="success"><?php echo sfContext::getInstance()->getUser()->getFlash("contact_success") ?></p>
		<?php endif; ?> 
		<dl>
			<dt><label for="<?php echo $form['name']->renderId() ?>"<?php echo $form['name']->hasError() ? ' class="error"' : '' ?>>Nombre:</label><span class="required">*</span></dt>
				<dd><?php echo $form["name"]->render()?>
					<p class="note<?php echo $form['name']->hasError() ? ' error' : '' ?>">Ingrese su nombre</p>
				</dd>
			<dt><label for="<?php echo $form['email']->renderId() ?>"<?php echo $form['email']->hasError() ? ' class="error"' : '' ?>>Email:</label><span class="required">*</span></dt>
				<dd><?php echo $form["email"]->render()?>
				<p class="note<?php echo $form['email']->hasError() ? ' error' : '' ?>">Ingrese una direcci&oacute;n de correo electr&oacute;nico</p>
				</dd>
				
			<dt><label for="<?php echo $form['comment']->renderId() ?>"<?php echo $form['comment']->hasError() ? ' class="error"' : '' ?>>Comentarios:</label></dt>
				<dd><?php echo $form["comment"]->render()?>
					<p class="note<?php echo $form['comment']->hasError() ? ' error' : '' ?>">Ingrese sus comentarios</p>
				</dd>
		</dl>
		<div class="clearfix"></div>
		<div style="float: right; margin: -10px;">
			<input type="submit" value="Enviar"/>
		</div>
		</form>
</div>
