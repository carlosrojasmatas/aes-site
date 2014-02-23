<?php use_javascript("jquery.qtip.min.js")?>
<?php use_javascript("jMonthCalendar.min.js")?>
<?php use_javascript("calendar/fullcalendar.min.js")?>
<?php use_javascript("events/events.js")?>
<?php use_javascript("jquery.timepicker.min.js")?>
<?php use_javascript("jquery-ui-1.10.3.custom.min.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_stylesheet("jquery.qtip.min.css")?>
<?php use_stylesheet("events/events.css")?>
<?php use_stylesheet("calendar/fullcalendar.css")?>
<?php use_stylesheet("calendar/fullcalendar.print.css")?>
<?php use_stylesheet("news/news.css")?>
<?php use_stylesheet("events/core.css")?>
<?php use_stylesheet("jquery.timepicker.css")?>
<?php use_stylesheet("jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.min.css")?>


<div class="separator-line"></div>
<div class="introline">
	<div class="intro-text" >
		<h3><span>Noticias y eventos</span></h3>
		<p>En esta secci&oacute;n se encuentra publicado el cronograma oficial AES para torneos, cursos, y ex&aacute;menes a nivel nacional.
		En el mismo se pueden visualizar las actividades de cada una de las provincias en el marco de la Asociaci&oacute;n. Contactanos y contanos
		tu cronograma local para poder reflejarlo en este sitio y as&iacute; difundir nuestra actividad.</p>
	</div>
</div>
<div class="separator-line"></div>


<div class="region-combo" >
	<div style="float:right; position:relative">
  <label>Ver eventos de: </label>
  <select id="regions">
			<option value="Argentina">Argentina</option>
			<?php foreach ($regions as $region):?>
				<option  value="<?php echo $region?>"><?php echo $region?></option>
			<?php endforeach;?>
	</select>
	</div>
	<?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
	<div style="float:right;"><input type="button" class="button" id="addNew" value="Agregar Noticia"/></div>
<?php endif;?>
	
</div>

<div id ="calendar-container">
<div id="calendar-background"></div>
<div id="calendar">
</div>
</div>

<div class="news-list">
		<?php include_partial("eventList",array("pager"=>$pager))?>
</div>



<!-- agregar noticias -->
<div id="new-form" class="new-form" style="<?php echo $form->hasErrors()?"display:block":"display:none".";"?>">
		<form class="new-form" method="post" enctype="multipart/form-data" action="<?php echo url_for("events/index")?>">
		<dl style="width: 860px">
			<dt><label for="<?php echo $form['title']->renderId() ?>"<?php echo $form['title']->hasError() ? ' class="error"' : '' ?>>Nombre:</label> </dt>
				<dd><?php echo $form["title"]->render()?></dd>
				
			<dt><label  for="<?php echo $form['description']->renderId() ?>"<?php echo $form['description']->hasError() ? ' class="error"' : '' ?>>Descripcion:</label></dt>
				<dd><?php echo $form["description"]->render()?></dd>
				
			<dt><label for="<?php echo $form['type']->renderId() ?>"<?php echo $form['type']->hasError() ? ' class="error"' : '' ?>>Tipo:</label></dt>
				<dd><?php echo $form["type"]->render()?></dd>
			
			<dt><label for="<?php echo $form['image']->renderId() ?>"<?php echo $form['image']->hasError() ? ' class="error"' : '' ?>>Imagen:</dt>
				<dd><?php echo $form["image"]->render()?></dd>
				
			<dt><label for="<?php echo $form['f_image']->renderId() ?>"<?php echo $form['f_image']->hasError() ? ' class="error"' : '' ?>>Imagen frontal:</dt>
				<dd><?php echo $form["f_image"]->render()?></dd>
				
			<div id="event-details" style="display: none;">	
				<dt><label for="<?php echo $form['province']->renderId() ?>"<?php echo $form['province']->hasError() ? ' class="error"' : '' ?>>Provincia:</label></dt>
					<dd><?php echo $form["province"]->render()?></dd>
					
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

