<?php use_javascript("jquery-ui-1.10.3.custom.min.js")?>
<?php use_javascript("dojos/dojos.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_stylesheet("dojos/dojos.css")?>
<?php use_stylesheet("magnific-popup.css")?>
<?php use_stylesheet("jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.css")?>

<div class="separator-line"></div>
<div class="intro-line">
	<div class="intro-text" >
		<h3><span>Listado de Dojos<span></h3>
		<p>Este es el listado oficial de Dojos certificados de AES. Si no apareces en el mismo pod&eacute;s enviarnos tus datos haciendo click <a href="<?php echo url_for("dojos/new")?>"> >>ACA<< </a>
		</p>
	</div>
</div>
<div class="separator-line"></div>

<div id="dojos-header">
	<span style="float: left; font-size: 20px" id="dojos-title">Dojos de <?php echo $selected?></span>
	<form id="search-form" action="<?php echo url_for("dojos/index")?>" style="float: right;">
		<select name="region" id="combo-regions">
			<option value="Argentina">Argentina</option>
			<?php foreach ($regions as $region):?>
				<option  value="<?php echo $region?>" <?php echo ($region==$selected)?"selected='selected'":"''"?> ><?php echo $region?></option>
			<?php endforeach;?>
		</select>
	</form>
</div>
<div class="list-dojo" >
		<?php include_partial("dojoList",array("pager"=>$pager))?>
</div>

<div id="map-container" style="display: none;">
	<div id="map" style="display: none;"></div>
</div>
<div class="clearfix"></div>


<div class="dojo-detail"></div>