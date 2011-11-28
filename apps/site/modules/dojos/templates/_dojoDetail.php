	<dl>
		<dt><label>Nombre:</label></dt>
			<dd><?php echo $dojo->getName()?></dd>
		<dt><label>Direccion:</label></dt>
			<dd><?php echo $dojo->getAddress()?> - <?php echo $dojo->getCity()?> - <?php echo $dojo->getProvince()?></dd>
		<dt><label>Profesor:</label></dt>
			<dd><?php echo $dojo->getSensei()?></dd>
		<dt><label>Datos de Contacto:</label></dt>
			<dd>Telefono: <?php echo $dojo->getPhone()?> - Email: <?php echo $dojo->getEmail()?></dd>
		<dt></dt>
			<dd><img src="<?php echo $dojo->getPhoto()?>"></dd>
	</dl>
