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
		<h3><span>Asociaci&oacute;n de Escuelas Shotokan de Karate</span></h3>
		<p>Te damos la bienvenida al sitio oficial de <b>AES Argentina</b>, &uacute;nico representante autorizado de la <b>Japan Karate Asociation</b>. Aquí encontraras toda la informaci&oacute;n relacionada		 con la actividad deportiva y organizacional a nivel nacional. 
		Torneos, ex&aacute;menes, cursos, notas, fotos, videos, datos de dojos y mucho más.</p>
	</div>
</div>
<div class="separator-line"></div>


<div id="mix-in" class="slidorion">
	<div class="slider">
	<?php foreach($news as $new):?>
		<?php $frontImage = ($new->getFImage() != null ? $new->getFImage():$new->getImage());?>
		<div class="slide"><img height="350px" width="100%" src="<?php echo $frontImage?>" /></div>
	<?php endforeach;?>
    </div>
    <div class="accordion">
    <?php foreach($news as $new):?>
    	<div class="header"><?php echo $new->getTitle()?></div>
        <div class="content"><?php echo strip_tags(strlen($new->getDescription())>110?substr($new->getDescription(),0,110)."...":$new->getDescription())?><br><a href="<?php if($new->type=="inst"): echo url_for('news/showDetails'); else: echo url_for('events/showDetails'); endif;?>?id=<?php echo $new->getId();?>">ver mas</a></div>
	<?php endforeach;?>
    </div>    
</div>
<div class="clear"></div>

<div class="boxes" >
<div id="boxes-container">
<!-- Institucionales -->
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("news/index")?>">Comunicaciones </a>
	</div>
	<div class="content-box-body">
		<div class="content-box-list">
			<?php foreach($insts as $inst):?>
				<div class="content-box-row">
					<a href="<?php echo url_for('news/showDetails')?>?id=<?php echo $inst->getId();?>"><?php echo $inst->getTitle();?></a>
				</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="content-box-footer" ></div>
</div>
<!-- Hombu dojo -->
<div class="content-box" style="display: none;">
	<div class="content-box-header" >
		<a href="<?php echo url_for("news/index")?>">Desde el Hombu</a>
	</div>
	<div class="content-box-body">
		<div class="content-box-list">
			<?php foreach($hombus as $hombu):?>
				<div class="content-box-row">
					<a href="<?php echo url_for('news/showDetails')?>?id=<?php echo $hombu->getId();?>"><?php echo $hombu->getTitle();?></a>
				</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="content-box-footer" ></div>
</div>
<!-- Eventos -->
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("news/index")?>">Pr&oacute;ximos Eventos</a>
	</div>
	<div class="content-box-body">
		<div class="content-box-list">
			<?php foreach($events as $event):?>
				<div class="content-box-row">
					<span class="date"><?php echo $event->getStartpreformattedDate();?></span>
					<a href="<?php echo url_for('news/showDetails')?>?id=<?php echo $event->getId();?>"><?php echo $event->getTitle();?></a>
				</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="content-box-footer" ></div>
</div>
<!-- Nuevos dojos -->
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("albums/index")?>">Nuevos Dojos</a>
	</div>
	<div class="content-box-body">
		<div class="content-box-list">
			<?php foreach($dojos as $dojo):?>
				<!-- aqui irian los eventos que faltan del 2010 -->
				<div class="content-box-row">
					<a href="<?php echo url_for("albums/showResources")?>?type=image&albumId=<?php echo $dojo->getId();?>"><?php echo $dojo->getName();?></a>
				</div>
			<?php endforeach;?>
		</div>	
	</div>
	<div class="content-box-footer" >
	</div>
</div>
</div>
</div>


<div class="add-dojo" style="display: none;"> 
	<h2>Carga tu Dojo!</h2>
	<div class="add-dojo-text">
	<span>Si sos instructor en cualquier parte del pa&iacute;s y queres formar parte del <a href="<?php echo url_for("dojos/new")?>"> listado oficial </a> 
	envianos tus datos  haciendo click <a href="<?php echo url_for("dojos/new")?>"> ACA </a>. <br>
	Una vez recibidos los mismos nos pondremos en contacto contigo para validarlos. Ayudanos a difundir los lugares de pr&aacute;ctica!</span>
	</div>
</div>
<div class="clear"></div>


