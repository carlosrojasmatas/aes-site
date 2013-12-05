<?php foreach ($pager->getResults() as $dojo):?>
<div id="dojo-row">
	<span class="dojo-header"> <?php echo $dojo->getName();?></span>
	<img  src="<?php echo $dojo->getPhoto();?>">
	<div class="dojo-data">
		<table>
			<tbody>
				<tr>
					<td name="<?php echo $dojo->getName()?>" class="dojo-field">Nombre:</td>
					<td><?php echo $dojo->getName()?></td>
				</tr>
				<tr>
					<td class="dojo-field">Direcci&oacute;n:</td>
					<td><?php echo $dojo->getAddress()?></td>
				</tr>
				<tr>
					<td class="dojo-field">Profesor:</td>
					<td><?php echo $dojo->getSensei()?></td>
				</tr>
				<tr>
					<td class="dojo-field">Tel&eacute;fono:</td>
					<td><?php echo $dojo->getPhone()?></td>
				</tr>
				<tr>
					<td class="dojo-field">Email:</td>
					<td><?php echo $dojo->getEmail()?></td>
				</tr>
				<tr class="dojo-footer">
					<td colspan="2" >
						<a class="popup-gmaps" href="https://maps.google.com/maps?<?php echo $dojo->getFullAddress()?>" ><img title="Ver en mapa" src="/images/maps.png"/></a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script src="/js/magnific.js" type="text/javascript"></script>
<script lang="text/javascript">
            $('.popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                removalDelay: 160,
                mainClass: 'mfp-zoom',
                preloader: false,
                fixedContentPos: false
             });
    </script>


<?php endforeach;?>
<div style="clear: both;"></div>
<div class="paginator">

	<?php if ($pager->haveToPaginate()): ?>
	<div
		style="width: 20px; float: left; margin-top: 3px; margin-right: 20px; ">
		<a href="<?php echo url_for('dojos/index').'?page='.$pager->getFirstPage() ?>">
			<img src="/images/ad_prev.png"/>
		</a>
	</div>
	<div>
	<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
		<div class="paginator-number">
			<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'dojos/index?page='.$page) ?>
		</div>
		<?php endforeach ?>
	</div>
	<div
		style="width: 20px; float: left; margin-left: 20px; margin-top: 3px;">
		<a href="<?php echo url_for('dojos/index').'?page='.$pager->getLastPage() ?>">
			<img src="/images/ad_next.png"/>
		</a>
		
	</div>
<?php endif ?>

</div>

<div id="img-container" class="dojo-popup" style="display: none;">
	<a href="#" id="img-close" class="aes-link close-button"><img title="Cerrar" src="/images/close.png"/></a>
	<img src="" style="display: block;">
</div>

