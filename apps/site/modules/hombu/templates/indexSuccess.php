<?php use_javascript("hombu/hombu.js")?>
<?php use_javascript("hombu/jquery.flexslider-min.js")?>
<?php use_stylesheet("flexslider/flexslider.css")?>
<?php use_stylesheet("main.css")?>
<?php use_stylesheet("hombu/hombu.css")?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&sensor=false"></script>


<div class="separator-line"></div>
<div class="intro-line">
	<div class="intro-text" >
		<h3><span>Nuestro Hombu Dojo<span></h3>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse arcu tellus, dictum sed lectus nec, sagittis mattis justo. Nunc iaculis orci in nisi vulputate malesuada quis in ligula. Proin eleifend tortor vel velit pellentesque, sed lacinia magna eleifend. Etiam tempus, metus vel accumsan condimentum, nisi lorem dictum urna, non tincidunt tortor neque posuere nulla. Fusce hendrerit non sem pharetra pretium. Quisque nec lacinia metus. Sed mi diam, iaculis non ultrices nec, dapibus id orci. Suspendisse lacinia dui enim, ac rutrum leo suscipit et.
		</p>
	</div>
</div>

<div class="separator-line"></div>		

<div class="flexslider" style="margin:auto; width: 80%">
  <ul class="slides">
    <li>
      <img src="/images/hombu/slide1.jpg" height="400px"/>
    </li>
    <li>
      <img src="/images/hombu/slide2.jpg" height="400px"/>
    </li>
    <li>
      <img src="/images/hombu/slide3.jpg" height="400px"/>
    </li>
    <li>
      <img src="/images/hombu/slider4.jpg" height="400px"/>
    </li>
  </ul>
</div>

<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>

<div class="info-container">
			<div class="partial-info">
				<h2>Donde estamos</h2>
				<p>Nos encontramos ubicados en Capital Federal, barrio de Villa Crespo, en las intersecciones de las 
				calles Corrientes y Malabia.</p>
				
				<h3> Lineas de colectivos</h3>
				<p>120, 121, 122, 123</p>
				
				<h3> Subtes</h3>
				<p>Linea B estaci&oacute;n <b>Malabia</b></p>
			</div>
			
			<div class="map-container">
				<div id="hombu-map" style="width:400px; height:250px"></div>
			</div>
</div>