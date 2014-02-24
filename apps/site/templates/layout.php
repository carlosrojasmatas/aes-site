<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>JKA Argentina - Asociacion de Escuelas Shotokan</title>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
<link rel="shortcut icon" href="/images/favicon.png" type="image/png">
</head>
<body>
	<div id="pageWrap">
		<div id="header">
			<a style="outline:none; position: relative;" href="<?php echo url_for("home/home")?>"> 
				<div style=" width: 132px;height: 132px;float: left "></div></a>
			<div class="login" style="float:right; margin: 20px 70px">
				<?php if(sfContext::getInstance()->getUser()->hasCredential("admin")):?>
					<a class="adminLink" href=<?php echo sfConfig::get("app_admin_url")?>>Administraci&oacute;n</a>
					<a class="adminLink" href=<?php echo url_for("auth/logout")?>>Salir</a>
				<?php else:?>
					<a class="adminLink" href=<?php echo url_for("auth/login")?>>Ingreso administradores</a>
				<?php endif;?>
			</div>
		</div>
		<div class="line"></div>
		<div id="container">
			<div id="menubar" >
				<div id="menucontainer">
				<?php $selected= sfContext::getInstance()->getModuleName()."/".sfContext::getInstance()->getActionName()?>
				<ul id="nav">
					<li style="width: 10%" <?php echo ($selected=="home/home")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("home/home")?>">Home</a></li>
					<li style="width: 13%" <?php echo ($selected=="home/about")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("home/about")?>">Quienes Somos</a></li>
					<li style="width: 12%" <?php echo ($selected=="hombu/index")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("hombu/index")?>">Hombu Dojo</a></li>
					<li style="width: 14%" <?php echo ($selected=="news/comms" || $selected=="news/showDetails")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("news/comms")?>">Comunicaciones</a></li>
					<li style="width: 15%" <?php echo ($selected=="events/index" || $selected=="events/showDetails")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("events/index")?>">Noticias y Eventos</a></li>
					<li style="width: 10%" <?php echo ($selected=="dojos/index" || $selected=="dojos/new")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("dojos/index")?>">Dojos</a></li>
					<li style="width: 14%" <?php echo ($selected=="albums/index" || $selected=="albums/showResources")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("albums/index")?>">Fotos y Videos</a></li>
					<li style="width: 12%" <?php echo ($selected=="home/contact")?"id='selected'":""?>><a class="menu-link" href="<?php echo url_for("home/contact")?>">Contacto</a></li>
				</ul>
				</div>
			</div>
		</div>
		<div id="pageBody">
		
			<div id="mainContent">
				<?php echo $sf_content ?>
			</div>

		</div>
		<div class="line"></div>
		<div id="footer">
			<div class="link-to-pages">
				<a href="http://www.jka.or.jp/english/e_index.html" target="_blank"><img src="/images/logo-jka.png" /></a> 
			</div>
			<div class="link-to-pages">
				<img src="/images/footer-aes.png" />
			</div>
		</div>
	</div>

</body>

</html>
