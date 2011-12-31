<?php use_javascript("albums/albumResources.js")?>
<?php use_javascript("albums/jquery.media.js")?>
<?php use_javascript("gallery/jquery.ad-gallery.pack.js")?>
<?php use_javascript("jquery.prettyPhoto.js")?>
<?php use_stylesheet("albums/albums.css")?>
<?php use_stylesheet("gallery/jquery.ad-gallery.css")?>
<?php use_stylesheet("prettyPhoto.css")?>
<?php use_stylesheet("jquery-ui/smoothness/jquery-ui-1.8.12.custom.css")?>


<div id="toolbar" class="gallery-header" >
		<?php if($album->getType()=='public' || sfContext::getInstance()->getUser()->hasCredential('admin')):?>
	 			<div id="add-photo-banner">
					<span>Si tenes una foto de este &aacute;lbum y queres publicarla hac&eacute; click <a id="add-resource" href="#">aca</a></span>
				</div>
	 	<?php endif;?>
	<span><?php echo $album->getName()?></span>
</div>

<div class="image-container">
<?php $resources= ($type=="image")?$album->getPhotos():$album->getVideos();?>
<?php if(!$resources || count($resources)==0):?>
<div class="empty-album">
	<h2>El album está vacio</h2>
</div>
<?php else:?>

		<?php if($type=="image"):?>
			<?php foreach ($resources as $resource): ?>
					<a href="<?php echo $resource->getPath()?>" rel="prettyPhoto[pp_gal]" title="Enviado por <?php echo $resource->getSender()?> - <?php echo $resource->getCity()?>"><img src="<?php echo $resource->getThumbnailPath()?>" width="60" height="60" alt="<?php echo $resource->getDescription()?>" /></a>
			<?php endforeach; ?>
		<?php else:?>
			 Proximamente!
		<?php endif;?>	
<?php endif;?>
			</div>
<?php echo link_to('Volver', 'albums/index') ?>			
<?php if ($form->hasErrors()):?>
  	<div id="popup-overlay" ></div>
<?php endif;?>
<div id="new-form" style="display: none;">
	<form class="resource-form"  enctype="multipart/form-data" method="post" 
		action="<?php echo url_for("albums/newResource")?>">
		<dl>
			<dt>
				<label for="<?php echo $form['description']->renderId() ?>"<?php echo $form['description']->hasError() ? ' class="error"' : '' ?>>Descripci&oacute;n:</label><span class="required">*</span>
			</dt>
			<dd>
				<input id="album_resource_parent_id" type="hidden" name="album_resource[parent_id]" value="<?php echo $album->getId()?>"/>
				<input id="type" type="hidden" name="type" value="<?php echo $type?>"/>
				<?php echo $form["description"]->render()?>
				<p class="note<?php echo $form['description']->hasError() ? ' error' : '' ?>">Ingresa una descripci&oacute;n de la foto</p>
			</dd>
			<dt>
				<label for="<?php echo $form['sender']->renderId() ?>"<?php echo $form['sender']->hasError() ? ' class="error"' : '' ?>>Nombre:</label><span class="required">*</span>
			</dt>
			<dd>
				<?php echo $form["sender"]->render()?>
				<p class="note<?php echo $form['sender']->hasError() ? ' error' : '' ?>">Ingresa tu nombre</p>
			</dd>
			<dt>
				<label for="<?php echo $form['city']->renderId() ?>"<?php echo $form['city']->hasError() ? ' class="error"' : '' ?>>Ciudad:</label><span class="required">*</span>
			</dt>
			<dd>
				<?php echo $form["city"]->render()?>
				<p class="note<?php echo $form['city']->hasError() ? ' error' : '' ?>">Ingresa tu cuidad</p>
			</dd>
			<dt>
				<label for="<?php echo $form['path']->renderId() ?>"
				<?php echo $form['path']->hasError() ? ' class="error"' : '' ?>>Foto:</label><span class="required">*</span>
			</dt>
			<dd>
				<?php echo $form["path"]->render()?>
				<p class="note<?php echo $form['path']->hasError() ? ' error' : '' ?>">Selecciona una foto</p>
			</dd>
			<dt>
				<label for="<?php echo $form['captcha']->renderId() ?>"
				<?php echo $form['captcha']->hasError() ? ' class="error"' : '' ?>>Verificaci&oacute;n:</label><span class="required">*</span>
			</dt>
			<dd >
				<?php echo $form["captcha"]->render()?>
				<p class="note<?php echo $form['captcha']->hasError() ? ' error' : '' ?>">Escriba los n&uacute;meros tal cual aparecen</p>
			</dd>
		</dl>
			<div class="clearfix"></div>
		<div style="float: right; margin: 5px;">
			<input type="submit" value="Enviar"/> <input id="button-cancel" type="button" value="Cancelar"/>
		</div>
	</form>
</div>
