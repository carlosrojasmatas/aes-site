<div id="event-image" style="display: none;">
	<button id="event-img-close">Cerrar</button>
	<br>
	<img src="">
</div>
<?php foreach ($pager->getResults() as $event):?>

<div id="event-row">
	<h3> <?php 
		if($event->getStartPreformattedDate() != $event->getEndPreformattedDate()) {
			$title= $event->getStartPreformattedDate()." - " .$event->getEndPreformattedDate();
		}else{
			$title= $event->getStartPreformattedDate();
		}
		echo $title;?></h3>
	<div class="event-detail <?php echo (strtotime($event->getStartDate()) < strtotime(date('Y-n-j'))?"overdue-event":"")?>">
		<a href="#" class="show-image" mainimage=<?php echo $event->getMainImage();?>><img src="<?php echo $event->getIconImagePath();?>"></a>
		<span class="title"><?php echo $event->getTitle();?></span><br>
	   <span class="data"> <?php echo $event->getStartTime()." - ".$event->getEndTime();?></span><br>
		<span class="data"><?php echo $event->getPlace();?></span><br>
		<?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
			<form action="events/delete">
				<input type="hidden" name="eventId" value="<?php echo $event->getId();?>">
				<input type="submit" value="Borrar">
			</form>	
		<?php endif;?>
	</div>
</div>

<?php endforeach;?>
<div style="clear: both;"></div>
<div class="paginator">

	<?php if ($pager->haveToPaginate()): ?>
	<div
		style="width: 20px; float: left; margin-top: 3px; margin-right: 20px; ">
		<a href="<?php echo url_for('events/index').'?page='.$pager->getFirstPage() ?>">
			<img src="/images/ad_prev.png"/>
		</a>
	</div>
	<div>
	<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
		<div class="paginator-number">
			<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'events/index?page='.$page) ?>
		</div>
		<?php endforeach ?>
	</div>
	<div
		style="width: 20px; float: left; margin-left: 20px; margin-top: 3px;">
		<a href="<?php echo url_for('events/index').'?page='.$pager->getLastPage() ?>">
			<img src="/images/ad_next.png"/>
		</a>
		
	</div>
<?php endif ?>

</div>

