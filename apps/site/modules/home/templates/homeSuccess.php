<?php use_javascript("home.js")?>
<?php use_stylesheet("home.css")?>
<div class="section-header" id="section-home">
	
</div>

<div id="featured" >
 <ul class="ui-tabs-nav">
     <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1">
     	<a href="#fragment-1">
     		<img height="50" src="<?php echo $news[0]->getMainImage()?>" alt="" />
     		<span><?php echo strip_tags(strlen($news[0]->getDescription())>110?substr($news[0]->getDescription(),0,110)."...":$news[0]->getDescription())?></span>
     	</a>
     </li>
     <li class="ui-tabs-nav-item" id="nav-fragment-2">
     	<a href="#fragment-2"><img height="50" src="<?php echo $news[1]->getMainImage()?>" alt="" />
     		<span><?php echo strip_tags(strlen($news[1]->getDescription())>110?substr($news[1]->getDescription(),0,110)."...":$news[1]->getDescription())?>
     		</span>
     	</a>
     </li>
     <li class="ui-tabs-nav-item" id="nav-fragment-3">
     	<a href="#fragment-3">
     		<img height="50" src="<?php echo $news[2]->getMainImage()?>" alt="" />
     		<span><?php echo strip_tags(strlen($news[2]->getDescription())>110?substr($news[2]->getDescription(),0,110)."...":$news[2]->getDescription())?></span>
     	</a>
     </li>
     <li class="ui-tabs-nav-item" id="nav-fragment-4">
     	<a href="#fragment-4">
     		<img height="50" src="<?php echo $news[3]->getMainImage()?>" alt="" />
     		<span><?php echo strip_tags(strlen($news[3]->getDescription())>110?substr($news[3]->getDescription(),0,110)."...":$news[3]->getDescription())?></span>
     	</a>
     </li>
     <li class="ui-tabs-nav-item" id="nav-fragment-5">
     	<a href="#fragment-5">
     		<img height="50" src="<?php echo $news[4]->getMainImage()?>" alt="" />
     		<span><?php echo strip_tags(strlen($news[4]->getDescription())>110?substr($news[4]->getDescription(),0,110)."...":$news[4]->getDescription())?></span>
     	</a>
     </li>
 </ul>
 <!-- First Content -->
 <div id="fragment-1" class="ui-tabs-panel" style="">
  <img src="<?php echo $news[0]->getMainImage()?>" alt="" />
  <div class="info" >
  <h2><a href="<?php echo url_for("news/showDetails")."?id=".$news[0]->getId()?>" ><?php echo $news[0]->getTitle()?></a></h2>
  <?php echo strlen($news[0]->getDescription())>150?substr($news[0]->getDescription(),0,150)."...":$news[0]->getDescription()?>
  </div>
 </div>
 <!-- Second Content -->
 <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
  <img src="<?php echo $news[1]->getMainImage()?>" alt="" />
  <div class="info" >
  <h2><a href="<?php echo url_for("news/showDetails")."?id=".$news[1]->getId()?>" ><?php echo $news[1]->getTitle()?></a></h2>
  <?php echo strlen($news[1]->getDescription())>150?substr($news[1]->getDescription(),0,150)."...":$news[1]->getDescription()?>
  </div>
 </div>
 <!-- Third Content -->
 <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
  <img src="<?php echo $news[2]->getMainImage()?>" alt="" />
  <div class="info" >
  <h2><a href="<?php echo url_for("news/showDetails")."?id=".$news[2]->getId()?>" ><?php echo $news[2]->getTitle()?></a></h2>
  <?php echo strlen($news[2]->getDescription())>150?substr($news[2]->getDescription(),0,150)."...":$news[2]->getDescription()?>
  </div>
 </div>
 <!-- Fourth Content -->
 <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
  <img src="<?php echo $news[3]->getMainImage()?>" alt="" />
  <div class="info" >
  <h2><a href="<?php echo url_for("news/showDetails")."?id=".$news[3]->getId()?>" ><?php echo $news[3]->getTitle()?></a></h2>
  <?php echo strlen($news[3]->getDescription())>150?substr($news[3]->getDescription(),0,150)."...":$news[3]->getDescription()?>
  </div>
 </div>
 <!-- Fifth Content -->
 <div id="fragment-5" class="ui-tabs-panel ui-tabs-hide" style="">
  <img src="<?php echo $news[4]->getMainImage()?>" alt="" />
  <div class="info" >
  <h2><a href="<?php echo url_for("news/showDetails")."?id=".$news[4]->getId()?>" ><?php echo $news[4]->getTitle()?></a></h2>
  <?php echo strlen($news[4]->getDescription())>150?substr($news[4]->getDescription(),0,150)."...":$news[4]->getDescription()?></a>
  </div>
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

