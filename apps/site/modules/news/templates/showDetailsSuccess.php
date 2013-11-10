<?php use_javascript("jquery-ui-1.8.12.custom.min.js")?>
<?php use_javascript("jquery-ui/jquery.ui.timepicker.js")?>
<?php use_javascript("news/news.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_stylesheet("news/news.css")?>
<?php use_stylesheet("jquery-ui/jquery-ui-timepicker.css")?>
<div id="slideshow">
	<div id="slidesContainer" >
		<div class="slide">
				<h2><?php echo $advert->getTitle()?></h2>
				<p>
					<?php if($advert->getType()=="event"):?>
						<b>Fecha: </b> <?php echo $advert->getStartDate()?><br>
						<b>Lugar: </b> <?php echo $advert->getPlace()?>
					<?php endif;?>
					<a id="show-image" href="#"><img height="220" src="<?php echo $advert->getImage()?>" /></a>
					<?php echo $advert->getDescription()?>
	     		</p>	
		</div>
	</div>
	<div id="news-footer">
			<a href="index" class="back-button"><img src="/images/back-btn.png"><p>Volver al listado</p> </a>
	</div>
</div>

<div id="advert-image" style="display: none;">
	<a href="#" id="img-close" class="aes-link close-button"><img title="Cerrar" src="/images/close.png"/></a>
	<br>
	<img src="<?php echo $advert->getImage();?>">
</div>