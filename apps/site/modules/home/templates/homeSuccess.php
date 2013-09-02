<?php use_javascript("home.js")?>
<?php use_javascript("jquery.flexslider-min.js")?>
<?php use_stylesheet("home.css")?>
<?php use_stylesheet("flexslider.css")?>

<div class="flex-nav-container">
<div class="flexslider">
  <ul class="slides">
    <li>
      <img height="400px" width="800px" src="<?php echo $news[0]->getImage()?>" />
      <p class="flex-caption"><?php echo strip_tags(strlen($news[0]->getDescription())>110?substr($news[0]->getDescription(),0,110)."...":$news[0]->getDescription())?></p>
    </li>
    <li>
      <img height="600px" width="800px" src="<?php echo $news[1]->getImage()?>" />
      <p class="flex-caption"><?php echo strip_tags(strlen($news[0]->getDescription())>110?substr($news[0]->getDescription(),0,110)."...":$news[0]->getDescription())?></p>
    </li>
    <li>
      <img height="600px" width="800px" src="<?php echo $news[2]->getImage()?>" />
      <p class="flex-caption"><?php echo strip_tags(strlen($news[0]->getDescription())>110?substr($news[0]->getDescription(),0,110)."...":$news[0]->getDescription())?></p>
    </li>
  </ul>
</div>
</div>

<div class="clear"></div>

<div class="boxes" >
<div class="content-box">
	<div class="content-box-header" >
		<a href="<?php echo url_for("news/index")?>">Calendario <?php $date= getdate(); echo $date["year"]?>  - Pr&oacute;ximos Eventos</a>
	</div>
	<div class="content-box-list">
		<?php foreach($events as $event):?>
			<!-- aqui irian los eventos que faltan del 2010 -->
			<div class="content-box-row">
				<span class="date"><?php echo $event->getStartpreformattedDate();?></span>
				<a href="<?php echo url_for('news/showDetails')?>?id=<?php echo $event->getId();?>"><?php echo $event->getTitle();?></a>
			</div>
		<?php endforeach;?>
	</div>
	<div class="content-box-footer" >
	</div>
</div>
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

