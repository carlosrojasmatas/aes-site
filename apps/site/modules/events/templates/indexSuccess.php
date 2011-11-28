<?php use_javascript("jquery-ui/jquery.ui.timepicker.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_javascript("colorpicker/colorpicker.js")?>
<?php use_javascript("lib/jshashtable-2.1.js")?>
<?php use_javascript("jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js")?>
<?php use_javascript("frontierCalendar/jquery-frontier-cal-1.3.2.min.js")?>
<?php use_javascript("events/events.js")?>
<?php use_stylesheet("frontierCalendar/jquery-frontier-cal-1.3.2.css")?>
<?php use_stylesheet("colorpicker/colorpicker.css")?>
<?php use_stylesheet("jquery-ui/jquery-ui-timepicker.css")?>
<?php use_stylesheet("jquery-ui/smoothness/jquery-ui-1.8.12.custom.css")?>
<?php use_stylesheet("events/events.css")?>
<div class="section-header" id="section-events">
</div>
	<div id="event-title" >
			<span >Eventos del <?php $date= getdate(); echo $date["year"]?></span>
			<div style="margin-right: 20px; float: right;">
			<span style="font-size: 14px; padding-top: 4px">Ver eventos de:</span>
			<select id="month">
				<option value="0">Todos</option>
				<option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
			</div>
	</div>
	
	<div id="event-list">
		<?php include_partial("eventList",array("pager"=>$pager))?>
	</div>
	
	<?php if ($form->hasErrors()):?>
	  	<div id="popup-overlay" ></div>
    <?php endif;?>
	
	<div id="new-form" style="<?php echo $form->hasErrors()?"display:block":"display:none".";"?>">
		<form class="news-form" method="post" enctype="multipart/form-data" action="<?php echo url_for("events/new")?>">
		<dl>
			<dt><label for="<?php echo $form['title']->renderId() ?>"<?php echo $form['title']->hasError() ? ' class="error"' : '' ?>>Nombre:</label> </dt>
				<dd><?php echo $form["title"]->render()?></dd>
				
			<dt><label for="<?php echo $form['description']->renderId() ?>"<?php echo $form['description']->hasError() ? ' class="error"' : '' ?>>Descripcion:</label></dt>
				<dd><?php echo $form["description"]->render()?></dd>
				
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
