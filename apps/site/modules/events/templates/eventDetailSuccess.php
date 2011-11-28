<?php use_stylesheet("events/events.css")?>
<?php use_javascript("events/events.js")?>
<div class="event-detail">
	<h3> <?php echo $event->getTitle();?></h3>
	<a id="show-image" href="#"><img src="<?php echo $event->getResizedImagePath();?>"></a>
	<p><?php echo $event->getDescription();?>		
	<a href="index">Volver</a>
	</p>
</div>

<div id="event-image" style="display: none;">
	<a href="#"><img id="event-img-close" alt="Cerrar" class="close-button"/></a>
	<br>
	<img src="<?php echo $event->getMainImage();?>">
</div>