<?php use_javascript("jquery-ui/jquery.ui.timepicker.js")?>
<?php use_javascript("news/news.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_stylesheet("news/news.css")?>
<?php use_stylesheet("jquery-ui/jquery-ui-timepicker.css")?>

<?php use_stylesheet("jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.min.css")?>
<div class="separator-line"></div>
<div class="introline">
	<div class="intro-text" >
		<h3><span>Comunicacione AES</span></h3>
		<p>En esta secci&oacute;n encontrar&aacute;s las comunicaciones oficiales de la asociaci&oacute;n</p>
	</div>
</div>
<div class="separator-line"></div>


<div class="news-list">
		<?php include_partial("commsList",array("pager"=>$pager))?>
		
		<div class="news-footer"></div>
</div>