
<div id="head">
	<div id="logo">
	<div class="login" style="float:right; margin: 20px 70px">
		<a class="adminLink" href="/<?php echo sfConfig::get("app_site_url")?>">Volver al sitio</a>
	</div>
	</div>
	
	<ul>
	<?php if($sf_user->hasCredential('admin')): ?>
		<li
		<?php if ( $sf_params->get('module') == 'advert'     ) echo ' class="active"' ?>><a
			href="<?php echo url_for('advert') ?>">Noticias y Eventos</a></li>
		<li
		<?php if ( $sf_params->get('module') == 'dojo'     ) echo ' class="active"' ?>><a
			href="<?php echo url_for('dojo') ?>">Dojos</a></li>
		<li
		<?php if ( $sf_params->get('module') == 'album'     ) echo ' class="active"' ?>><a
			href="<?php echo url_for('album') ?>">Albums</a></li>
		<li
		<?php if ( $sf_params->get('module') == 'albumResource'     ) echo ' class="active"' ?>><a
			href="<?php echo url_for('album_resource') ?>">Fotos y Videos</a>
		</li>
		<li><a class="out" href="<?php echo url_for("sf_guard_signout")?>">Salir</a>
		</li>
		<?php endif;?>
	</ul>
</div>
<div class="break"></div>
