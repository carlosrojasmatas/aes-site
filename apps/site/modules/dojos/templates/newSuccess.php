<?php use_javascript("jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js")?>
<?php use_javascript("jquery-ui-1.8.12.custom.min.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_javascript("dojos/dojos.js")?>
<?php use_stylesheet("dojos/dojos.css")?>
<?php use_stylesheet("main.css")?>
<h2>Carg&aacute; tu dojo!</h2>
<div id="new-dojo-form">
		<form  method="post" enctype="multipart/form-data" action="<?php echo url_for("dojos/new")?>">
		<dl>
			<dt><label for="<?php echo $form['name']->renderId() ?>"<?php echo $form['name']->hasError() ? ' class="error"' : '' ?>>Nombre:</label><span class="required">*</span></dt>
				<dd><?php echo $form["name"]->render()?>
					<p class="note<?php echo $form['name']->hasError() ? ' error' : '' ?>">Ingrese el nombre del dojo</p>
				</dd>
			<dt><label for="<?php echo $form['sensei']->renderId() ?>"<?php echo $form['sensei']->hasError() ? ' class="error"' : '' ?>>Profesor:</label><span class="required">*</span></dt>
				<dd>
					<?php echo $form["sensei"]->render()?>
					<p class="note<?php echo $form['sensei']->hasError() ? ' error' : '' ?>">Ingrese el nombre del profesor a cargo</p>
				</dd>
				
			<dt><label for="<?php echo $form['province']->renderId() ?>"<?php echo $form['province']->hasError() ? ' class="error"' : '' ?>>Provincia:</label><span class="required">*</span></dt>
				<dd><?php echo $form["province"]->render()?>
				<p class="note<?php echo $form['province']->hasError() ? ' error' : '' ?>">Seleccione una provincia</p>
				</dd>
				
			<dt><label for="<?php echo $form['city']->renderId() ?>"<?php echo $form['city']->hasError() ? ' class="error"' : '' ?>>Ciudad:</label><span class="required">*</span></dt>
				<dd><?php echo $form["city"]->render()?>
				<p class="note<?php echo $form['city']->hasError() ? ' error' : '' ?>">Ingrese una ciudad</p>
				</dd>
			
			<dt><label for="<?php echo $form['address']->renderId() ?>"<?php echo $form['address']->hasError() ? ' class="error"' : '' ?>>Direccion:</label><span class="required">*</span></dt>
				<dd><?php echo $form["address"]->render()?>
					<p class="note<?php echo $form['address']->hasError() ? ' error' : '' ?>">Por favor, ingrese la direcci&oacute;n COMPLETA del dojo</p>
				</dd>

			<dt><label for="<?php echo $form['phone']->renderId() ?>"<?php echo $form['phone']->hasError() ? ' class="error"' : '' ?>>Telefono:</label></dt>
				<dd><?php echo $form["phone"]->render()?>
				<p class="note<?php echo $form['phone']->hasError() ? ' error' : '' ?>">Ingrese un tel&eacute;fono</p>
				</dd>

			<dt><label for="<?php echo $form['email']->renderId() ?>"<?php echo $form['email']->hasError() ? ' class="error"' : '' ?>>Email:</label><span class="required">*</span></dt>
				<dd><?php echo $form["email"]->render()?>
				<p class="note<?php echo $form['email']->hasError() ? ' error' : '' ?>">Ingrese una direcci&oacute;n de correo electr&oacute;nico</p>
				</dd>
				
			<dt><label for="<?php echo $form['photo']->renderId() ?>"<?php echo $form['photo']->hasError() ? ' class="error"' : '' ?>>Foto:</label></dt>
				<dd><?php echo $form["photo"]->render()?>
					<p class="note<?php echo $form['photo']->hasError() ? ' error' : '' ?>">Seleccione una foto</p>
				</dd>
		</dl>
		<div class="clearfix"></div>
		<div style="float: right; margin: 5px;">
			<input type="submit" value="Enviar"/> <input id="button-cancel" type="button" value="Cancelar"/>
		</div>
		</form>
	</div>