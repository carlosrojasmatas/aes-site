<?php use_javascript("jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js")?>
<?php use_javascript("jquery-ui-1.8.12.custom.min.js")?>
<?php use_javascript("tiny_mce/jquery.tinymce.js")?>
<?php use_javascript("dojos/dojos.js")?>
<?php use_stylesheet("dojos/dojos.css")?>
<?php use_stylesheet("jquery-ui/smoothness/jquery-ui-1.8.12.custom.css")?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&sensor=false"></script>
<div class="section-header" id="section-dojos">
</div>
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
<div id="add-dojo-banner">
<span>Queres agregar tu dojo? Hace click <a id="new-dojo" href="<?php echo url_for("dojos/new")?>">aca</a></span>

</div>
<div class="dojo-detail"></div>