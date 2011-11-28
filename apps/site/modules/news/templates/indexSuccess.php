<?php use_javascript("jquery-ui-1.8.12.custom.min.js")?>
<?php use_javascript("jquery-ui/jquery.ui.timepicker.js")?>
<?php use_javascript("news/news.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_stylesheet("news/news.css")?>
<?php use_stylesheet("jquery-ui/jquery-ui-timepicker.css")?>

<?php use_stylesheet("jquery-ui/smoothness/jquery-ui-1.8.12.custom.css")?>
<div class="section-header" id="section-news">
	
</div>

<?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
	<input type="button" class="button" id="addNew" value="Agregar Noticia"/>
<?php endif;?>
<div class="news-list">
		<?php include_partial("newsList",array("pager"=>$pager))?>
		<?php include_partial("global/simplePopUp")?>
		<div class="news-footer"></div>
</div>

<?php if ($form->hasErrors()):?>
	<div id="popup-overlay" ></div>
<?php endif;?>
<div id="new-form" style="<?php echo $form->hasErrors()?"display:block":"display:none".";"?>">
		<form class="news-form" method="post" enctype="multipart/form-data" action="<?php echo url_for("news/index")?>">
		<dl style="width: 860px">
			<dt><label for="<?php echo $form['title']->renderId() ?>"<?php echo $form['title']->hasError() ? ' class="error"' : '' ?>>Nombre:</label> </dt>
				<dd><?php echo $form["title"]->render()?></dd>
				
			<dt><label  for="<?php echo $form['description']->renderId() ?>"<?php echo $form['description']->hasError() ? ' class="error"' : '' ?>>Descripcion:</label></dt>
				<dd><?php echo $form["description"]->render()?></dd>
				
			<dt><label for="<?php echo $form['type']->renderId() ?>"<?php echo $form['type']->hasError() ? ' class="error"' : '' ?>>Tipo:</label></dt>
				<dd><?php echo $form["type"]->render()?></dd>
				
			<div id="event-details" style="display: none;">	
				<dt><label for="<?php echo $form['place']->renderId() ?>"<?php echo $form['place']->hasError() ? ' class="error"' : '' ?>>Lugar:</label></dt>
					<dd><?php echo $form["place"]->render()?></dd>
					
				<dt><label for="<?php echo $form['start_date']->renderId() ?>"<?php echo $form['start_date']->hasError() ? ' class="error"' : '' ?>>Fecha de Comienzo:</label></dt>
					<dd><?php echo $form["start_date"]->render()?></dd>
					
				<dt><label for="<?php echo $form['start_time']->renderId() ?>"<?php echo $form['start_time']->hasError() ? ' class="error"' : '' ?>>Hora de Comienzo:</label></dt>
					<dd><?php echo $form["start_time"]->render()?></dd>
					
				<dt><label for="<?php echo $form['end_date']->renderId() ?>"<?php echo $form['end_date']->hasError() ? ' class="error"' : '' ?>>Fecha de Fin:</label></dt>
					<dd><?php echo $form["end_date"]->render()?></dd>
	
				<dt><label for="<?php echo $form['end_time']->renderId() ?>"<?php echo $form['end_time']->hasError() ? ' class="error"' : '' ?>>Hora de Fin:</label></dt>
					<dd><?php echo $form["end_time"]->render()?></dd>
			</div>	
			<dt><label for="<?php echo $form['main_image']->renderId() ?>"<?php echo $form['main_image']->hasError() ? ' class="error"' : '' ?>>Imagen:</dt>
				<dd><?php echo $form["main_image"]->render()?></dd>
			
			<dt id="attachementList" style="display: none;">Adjuntos:</dt>
				<dd style="display: none;"><input type="file"  value="Seleccionar" name="advert[attachements][]"></dd>
				<dd style="display: none;"><input type="file" value="Seleccionar" name="advert[attachements][]"></dd>
				<dd style="display: none;"><input type="file" value="Seleccionar" name="advert[attachements][]"></dd>
				<dd style="display: none;"><input type="file" value="Seleccionar" name="advert[attachements][]"></dd>
				<dd style="display: none;"><input type="file" value="Seleccionar" name="advert[attachements][]"></dd>
				
		</dl>
		<div class="clearfix"></div>
		<div style="float: right; margin: 5px;">
			<input type="submit" value="Enviar"/> <input id="button-cancel" type="button" value="Cancelar"/>
		</div>
		</form>
	</div>
