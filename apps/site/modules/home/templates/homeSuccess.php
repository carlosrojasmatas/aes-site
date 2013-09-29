<?php use_javascript("home.js")?>
<?php use_javascript("jquery.easing.js")?>
<?php use_javascript("jquery.slidorion.js")?>
<?php use_javascript("jquery.flexslider-min.js")?>
<?php use_stylesheet("home.css")?>
<?php use_stylesheet("slidorion.css")?>

<?php use_stylesheet("flexslider.css")?>
<!--<div class="section-header" id="section-home"></div>-->
<div class="separator-line"></div>
<div class="introline">
	<div class="intro-text" >
		<h3>Bienvenidos al sitio oficial de la <span>Asociaci&oacute;n de Escuelas Shotokan</span></h3>
		<p>Aquí encontraras toda la informaci&oacute;n relacionada con la actividad deportiva y organizacional a nivel nacional. Torneos, 
		exámenes, cursos, notas, fotos, videos, dojos y mucho más! </p>
	</div>
</div>
<div class="separator-line"></div>


<div id="mix-in" class="slidorion">
	<div class="slider">
		<div class="slide"><img src="<?php echo $news[0]->getImage()?>" /></div>
        <div class="slide"><img src="<?php echo $news[1]->getImage()?>" /></div>
        <div class="slide"><img src="<?php echo $news[2]->getImage()?>" /></div>
    </div>
    <div class="accordion">
    	<div class="header"><?php echo $news[0]->getTitle()?></div>
        <div class="content"><?php echo strip_tags(strlen($news[0]->getDescription())>110?substr($news[0]->getDescription(),0,110)."...":$news[0]->getDescription())?></div>
    	<div class="header"><?php echo $news[1]->getTitle()?></div>
        <div class="content"><?php echo strip_tags(strlen($news[1]->getDescription())>110?substr($news[0]->getDescription(),0,110)."...":$news[1]->getDescription())?></div>
    	<div class="header"><?php echo $news[2]->getTitle()?></div>
        <div class="content"><?php echo strip_tags(strlen($news[2]->getDescription())>110?substr($news[0]->getDescription(),0,110)."...":$news[2]->getDescription())?></div>
    </div>    
</div>
<div class="clear"></div>

<div class="boxes" >
<!-- Institucionales -->
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("news/index")?>">Institucionales </a>
	</div>
	<div class="content-box-list">
		<?php foreach($events as $event):?>
			<div class="content-box-row">
				<span class="date"><?php echo $event->getStartpreformattedDate();?></span>
				<a href="<?php echo url_for('news/showDetails')?>?id=<?php echo $event->getId();?>"><?php echo $event->getTitle();?></a>
			</div>
		<?php endforeach;?>
	</div>
	<div class="content-box-footer" >
	</div>
</div>
<!-- Hombu dojo -->
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("news/index")?>">Desde el Hombu</a>
	</div>
	<div class="content-box-list">
		<?php foreach($events as $event):?>
			<div class="content-box-row">
				<span class="date"><?php echo $event->getStartpreformattedDate();?></span>
				<a href="<?php echo url_for('news/showDetails')?>?id=<?php echo $event->getId();?>"><?php echo $event->getTitle();?></a>
			</div>
		<?php endforeach;?>
	</div>
	<div class="content-box-footer" >
	</div>
</div>
<!-- Eventos -->
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("news/index")?>">Pr&oacute;ximos Eventos - <?php $date= getdate(); echo $date["year"]?> </a>
	</div>
	<div class="content-box-list">
		<?php foreach($events as $event):?>
			<div class="content-box-row">
				<span class="date"><?php echo $event->getStartpreformattedDate();?></span>
				<a href="<?php echo url_for('news/showDetails')?>?id=<?php echo $event->getId();?>"><?php echo $event->getTitle();?></a>
			</div>
		<?php endforeach;?>
	</div>
	<div class="content-box-footer" >
	</div>
</div>
<!-- Nuevos dojos -->
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("albums/index")?>">Nuevas Fotos</a>
	</div>
	<div class="content-box-list">
		<?php foreach($albums as $album):?>
			<!-- aqui irian los eventos que faltan del 2010 -->
			<div class="content-box-row">
				<a href="<?php echo url_for("albums/showResources")?>?type=image&albumId=<?php echo $album->getId();?>"><?php echo $album->getName();?></a>
			</div>
		<?php endforeach;?>
	</div>	
	<div class="content-box-footer" >
	</div>
</div>
<div class="clear"></div>
</div>

