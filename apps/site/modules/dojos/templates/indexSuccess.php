<?php use_javascript("jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js")?>
<?php use_javascript("jquery-ui-1.8.12.custom.min.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_javascript("dojos/dojos.js")?>
<?php use_stylesheet("dojos/dojos.css")?>
<?php use_stylesheet("jquery-ui/smoothness/jquery-ui-1.8.12.custom.css")?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&sensor=false"></script>
<div class="section-header" id="section-dojos">
</div>
<div id="dojos-header">
	<span style="float: left; font-size: 20px" id="dojos-title">Dojos de <?php echo $selected?></span>
	<form id="search-form" action="<?php echo url_for("dojos/index")?>" style="float: right;">
		<select name="region" id="combo-regions">
			<option value="Argentina">Argentina</option>
			<?php foreach ($regions as $region):?>
				<option  value="<?php echo $region?>" <?php echo ($region==$selected)?"selected='selected'":"''"?> ><?php echo $region?></option>
			<?php endforeach;?>
		</select>
	</form>
</div>
<div class="list-dojo" >
		<?php include_partial("dojoList",array("pager"=>$pager))?>
</div>
<div id="map-container" style="display: none;">
	<div id="map" style="display: none;"></div>
</div>
<div class="clearfix"></div>
<div id="add-dojo-banner">
<span>Queres agregar tu dojo? Hace click <a id="new-dojo" href="<?php echo url_for("dojos/new")?>">aca</a> para cargar tus datos. En breve alguien te estar&aacute; contactando para verificarlos y agregarte a la lista definitiva! </span>

</div>
<div class="dojo-detail"></div>


<?php if ($form->hasErrors()):?>
	  	<div id="popup-overlay" ></div>
<?php endif;?>
		<div id="new-form" style="<?php echo $form->hasErrors()?"display:block":"display:none".";"?>">
		<form  method="post" enctype="multipart/form-data" action="<?php echo url_for("dojos/index")?>">
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
			<dt><label for="<?php echo $form['captcha']->renderId() ?>"<?php echo $form['captcha']->hasError() ? ' class="error"' : '' ?>>Verificaci&oacute;n:</label><span class="required">*</span></dt>
				<dd><?php echo $form["captcha"]->render()?>
					<p class="note<?php echo $form['captcha']->hasError() ? ' error' : '' ?>">Escriba lo que aparece en la imagen</p>
				</dd>
		</dl>
		<div class="clearfix"></div>
		<div style="float: right; margin: 5px;">
			<input type="submit" value="Enviar"/> <input id="button-cancel" type="button" value="Cancelar"/>
		</div>
		</form>
	</div>