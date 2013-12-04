<?php foreach ($pager->getResults() as $advert):?>
			<div class="news-row">
			  <?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
				<form action="<?php echo url_for("news/delete") ?>" method="post" id="form_<?php echo $advert->getId()?>">
					<input type="hidden" name="id" value="<?php echo $advert->getId()?>"/>			
				    <input type="button" class="button deleteButton" id="delete_<?php echo $advert->getId()?>" value="Borrar"/>
				</form>
				<?php endif;?>
				<div class="new-content">
					<div class="new-image"><img height="70" src="<?php echo $advert->getImage()?>"/></div>
					<div class="news-title">
						<a href="<?php echo url_for('events/showDetails').'?id='.$advert->getId()?>"><?php echo $advert->getTitle()?></a>
					</div>
					<?php echo strlen($advert->getDescription())>200?substr($advert->getDescription(),0,200)."...":$advert->getDescription()?>
				</div>
			</div>
<?php endforeach;?>
<div style="clear: both;"></div>
<div class="paginator">

	<?php if ($pager->haveToPaginate()): ?>
	<div
		style="width: 20px; float: left; margin-top: 10px; margin-right: 20px; ">
		<a href="<?php echo url_for('events/index').'?page='.$pager->getFirstPage() ?>">
			<img src="/images/ad_prev.png"/>
		</a>
	</div>
	<div>
	<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
		<div class="paginator-number" style="margin-top:10px">
			<?php echo ($page == $pager->getPage()) ? $page : "<a href=".url_for('events/index').'?page='.$page.">".$page."</a>" ?>
		</div>
		<?php endforeach ?>
	</div>
	<div style="width: 20px; float: left; margin-left: 20px; margin-top: 10px;">
		<a href="<?php echo url_for('events/index').'?page='.$pager->getLastPage() ?>">
			<img src="/images/ad_next.png"/>
		</a>
	</div>
<?php endif ?>

</div>

