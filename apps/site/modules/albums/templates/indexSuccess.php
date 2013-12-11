<?php use_javascript("albums/albums.js")?>
<?php use_javascript("albums/albumResources.js")?>
<?php use_stylesheet("albums/albums.css")?>
<?php use_stylesheet("jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.min.css")?>
<?php use_javascript("jquery.prettyPhoto.js")?>
<?php use_stylesheet("prettyPhoto.css")?>

<div class="separator-line"></div>
<div class="intro-line">
	<div class="intro-text" >
		<h3><span>Fotos y Videos<span></h3>
		<p>Esta secci&oacute;n contiene fotos y videos de torneos, cursos y encuentros y todo tipo de actividades desarrolladas en el marco de AES. 
		A trav&eacute;s de esta p&aacute;gina podr&aacute;s enviarnos tus propias fotos para que formen parte del sitio.</a>
		</p>
	</div>
</div>
<div class="separator-line"></div>
<div class="bar">
	<?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
	 	<div id="add-photo-banner">
			<button id="create-album" style="margin:20px;">Crear Album</button>
			<button id="add-photo">Subir foto</button>
		</div>
	<?php endif;?>
		<select id="album-select">
			<?php foreach ($pager->getResults() as $album): ?>
				<option value="<?php echo $album->getId()?>"><?php echo $album->getName()?></option>
			<?php endforeach; ?>
		</select>
	
</div>
<div class="album-list" >
<ul class="gallery">
		<li><a href="<?php echo $photo->getPath()?>" rel="prettyPhoto[pp_gal]" title="Enviado por <?php echo $photo->getSender()?> - <?php echo $photo->getCity()?>"><img src="<?php echo $photo->getThumbnailPath()?>" width="60" height="60" alt="<?php echo $photo->getDescription()?>" /></a></li>
</ul>
</div>
<div style="clear: both;"></div>
	
	<?php if ($form->hasErrors()):?>
	  	<div id="popup-overlay" ></div>
    <?php endif;?>
	<div id="new-form" class="new-form" style="display: none;">
		<form class="album-form" method="post"
			action="<?php echo url_for("albums/new")?>">
			<dl>
				<dt>
					<label for="<?php echo $form['name']->renderId() ?>"
					<?php echo $form['name']->hasError() ? ' class="error"' : '' ?>>Nombre:</label>
				</dt>
				<dd>
				<?php echo $form["name"]->render()?>
				</dd>
				
				<dt>
					<label for="<?php echo $form["type"]->renderId() ?>"
					<?php echo $form["type"]->hasError() ? ' class="error"' : '' ?>>Tipo:</label>
				</dt>
				<dd>
				<?php echo $form["type"]->render()?>
				</dd>
			</dl>
			<div class="clearfix"></div>
		<div style="float: right; margin: 5px;">
			<input type="submit" value="Enviar"/> <input id="button-cancel" type="button" value="Cancelar"/>
		</div>
		</form>
	</div>
</div>

<div id="new-photo-form" class="new-form" style="display: none;">
	<form class="resource-form"  enctype="multipart/form-data" method="post" 
		action="<?php echo url_for("albums/newResource")?>">
		<dl>
			<dt>
				<label for="<?php echo $rForm['description']->renderId() ?>"<?php echo $rForm['description']->hasError() ? ' class="error"' : '' ?>>Descripci&oacute;n:</label><span class="required">*</span>
			</dt>
			<dd>
				<input id="album_resource_parent_id" type="hidden" name="album_resource[parent_id]" value="<?php echo $album->getId()?>"/>
				<input id="type" type="hidden" name="type" value="image"/>
				<?php echo $rForm["description"]->render()?>
				<p class="note<?php echo $rForm['description']->hasError() ? ' error' : '' ?>">Ingresa una descripci&oacute;n de la foto</p>
			</dd>
			<dt>
				<label for="<?php echo $rForm['sender']->renderId() ?>"<?php echo $rForm['sender']->hasError() ? ' class="error"' : '' ?>>Nombre:</label><span class="required">*</span>
			</dt>
			<dd>
				<?php echo $rForm["sender"]->render()?>
				<p class="note<?php echo $rForm['sender']->hasError() ? ' error' : '' ?>">Ingresa tu nombre</p>
			</dd>
			<dt>
				<label for="<?php echo $rForm['city']->renderId() ?>"<?php echo $rForm['city']->hasError() ? ' class="error"' : '' ?>>Ciudad:</label><span class="required">*</span>
			</dt>
			<dd>
				<?php echo $rForm["city"]->render()?>
				<p class="note<?php echo $rForm['city']->hasError() ? ' error' : '' ?>">Ingresa tu cuidad</p>
			</dd>
			<dt>
				<label for="<?php echo $rForm['path']->renderId() ?>"
				<?php echo $rForm['path']->hasError() ? ' class="error"' : '' ?>>Foto:</label><span class="required">*</span>
			</dt>
			<dd>
				<?php echo $rForm["path"]->render()?>
				<p class="note<?php echo $rForm['path']->hasError() ? ' error' : '' ?>">Selecciona una foto</p>
			</dd>
<!--			<dt>-->
<!--				<label for="<?php //echo $rForm['captcha']->renderId() ?>"-->
<!--				<?php //echo $rForm['captcha']->hasError() ? ' class="error"' : '' ?>>Verificaci&oacute;n:</label><span class="required">*</span>-->
<!--			</dt>-->
			<!--<dd >
				<?php //echo $rForm["captcha"]->render()?>
				<p class="note<?php //echo $rForm['captcha']->hasError() ? ' error' : '' ?>">Escriba los n&uacute;meros tal cual aparecen</p>
			</dd>
		-->
		</dl>
			<div class="clearfix"></div>
		<div style="float: right; margin: 5px;">
			<input type="submit" value="Enviar"/> <input id="button-cancel-photo" type="button" value="Cancelar"/>
		</div>
	</form>
</div>
