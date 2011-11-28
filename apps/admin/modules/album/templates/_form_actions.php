<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Esta seguro?',  'class_suffix' => 'delete',  'label' => 'Borrar',)) ?>
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Volver al listado',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Guardar',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Guardar y agregar',)) ?>
<?php else: ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Borrar',)) ?>
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Volver al listado',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Guardar',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Guardar y agregar',)) ?>
<?php endif; ?>
</ul>
