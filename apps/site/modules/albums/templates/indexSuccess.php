<?php use_javascript("albums/albums.js")?>
<?php use_javascript("gallery/jquery.ad-gallery.pack.js")?>
<?php use_javascript("jquery.animate-shadow-min.js")?>
<?php use_stylesheet("albums/albums.css")?>
<?php use_stylesheet("jquery-ui/smoothness/jquery-ui-1.8.12.custom.css")?>

<div class="section-header" id="section-albums">
</div>

<div class="bar">
	<?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
		<button id="create-album" style="margin:20px;">Crear Album</button>
	<?php endif;?>
</div>
<div class="album-list">

<?php foreach ($pager->getResults() as $album): ?>
	<div class="album-cover">
		<img src="<?php echo $album->getFrontImage()?>"/>
		<a href="<?php echo url_for("albums/showResources")."?type=image&albumId=".$album->getId()?>"><?php echo $album->getName()?></a>
		
		
	</div>
<?php endforeach; ?>
<div style="clear: both;"></div>
	
	<div class="paginator">
	
		<?php if ($pager->haveToPaginate()): ?>
			<div>
				style="width: 20px; float: left; margin-top: 3px; margin-right: 20px; ">
				<a href="<?php echo url_for('albums/index').'?page='.$pager->getFirstPage() ?>">
					<img src="/images/ad_prev.png"/>
				</a>
			</div>
			<div>
			<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
				<div class="paginator-number">
					<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'albums/index?page='.$page) ?>
				</div>
				<?php endforeach ?>
			</div>
			<div>
				style="width: 20px; float: left; margin-left: 20px; margin-top: 3px;">
				<a href="<?php echo url_for('albums/index').'?page='.$pager->getLastPage() ?>">
					<img src="/images/ad_next.png"/>
				</a>
				
			</div>
		<?php endif ?>
	
	</div>
	<?php if ($form->hasErrors()):?>
	  	<div id="popup-overlay" ></div>
    <?php endif;?>
	<div id="new-form" style="display: none;">
		<form class="album-form" method="post"
			action="<?php echo url_for("albums/new")?>">
			<dl>
				<dt>
					<label for="<?php echo $form['name']->renderId() ?>"
					<?php echo $form['name']->hasError() ? ' class="error"' : '' ?>>Nombre:</label>
				</dt>
				<dd>
				<?php echo $form["name"]->render()?>
				</dd>
				
				<dt>
					<label for="<?php echo $form["type"]->renderId() ?>"
					<?php echo $form["type"]->hasError() ? ' class="error"' : '' ?>>Tipo:</label>
				</dt>
				<dd>
				<?php echo $form["type"]->render()?>
				</dd>
			</dl>
			<div class="clearfix"></div>
		<div style="float: right; margin: 5px;">
			<input type="submit" value="Enviar"/> <input id="button-cancel" type="button" value="Cancelar"/>
		</div>
		</form>
	</div>
</div>