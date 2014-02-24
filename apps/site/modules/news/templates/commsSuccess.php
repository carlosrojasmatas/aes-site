<?php use_javascript("jquery-ui/jquery.ui.timepicker.js")?>
<?php use_javascript("news/news.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_stylesheet("news/news.css")?>
<?php use_stylesheet("jquery-ui/jquery-ui-timepicker.css")?>

<?php use_stylesheet("jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.min.css")?>
<div class="separator-line"></div>
<div class="introline">
	<div class="intro-text" >
		<h3><span>Comunicaciones oficiales AES</span></h3>
		<p>Esta secci&oacute;n est&aacute; pensada para mantener informados a los practicantes e instructores
		acerca de las novedades de caracter institucional. Recordamos que este canal es el <b>&uacute;nico autorizado</b>
		a difundir las noticias organizacionales de nuestra Asociaci&oacute;n a nivel nacional. Cualquier inquietud no dudes en 
		contactarte con nosotros</p>
	</div>
</div>
<div class="separator-line"></div>


<div class="news-list">
		<?php include_partial("commsList",array("pager"=>$pager))?>
</div>