<?php foreach ($pager->getResults() as $advert):?>
			<div class="news-row">
			  <?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
				<form action="<?php echo url_for("news/delete") ?>" method="post" id="form_<?php echo $advert->getId()?>">
					<input type="hidden" name="id" value="<?php echo $advert->getId()?>"/>			
				    <input type="button" class="button deleteButton" id="delete_<?php echo $advert->getId()?>" value="Borrar"/>
				</form>
				<?php endif;?>
				<div class="news-title">
					<a href="<?php echo url_for('news/showDetails').'?id='.$advert->getId()?>"><?php echo $advert->getTitle()?></a>
				</div>
				<img height="70" src="<?php echo $advert->getImage()?>"/>
				<?php echo strlen($advert->getDescription())>200?substr($advert->getDescription(),0,200)."...":$advert->getDescription()?>
			</div>
<?php endforeach;?>
<div style="clear: both;"></div>
<div class="paginator">

	<?php if ($pager->haveToPaginate()): ?>
	<div
		style="width: 20px; float: left; margin-top: 3px; margin-right: 20px; ">
		<a href="<?php echo url_for('news/index').'?page='.$pager->getFirstPage() ?>">
			<img src="/images/ad_prev.png"/>
		</a>
	</div>
	<div>
	<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
		<div class="paginator-number">
			<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'news/index?page='.$page) ?>
		</div>
		<?php endforeach ?>
	</div>
	<div style="width: 20px; float: left; margin-left: 20px; margin-top: 3px;">
		<a href="<?php echo url_for('news/index').'?page='.$pager->getLastPage() ?>">
			<img src="/images/ad_next.png"/>
		</a>
	</div>
<?php endif ?>

</div>

