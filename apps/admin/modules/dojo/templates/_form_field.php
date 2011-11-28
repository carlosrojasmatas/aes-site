<?php if ($field->isPartial()): ?>
  <?php include_partial('dojo/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('dojo', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
    <?php echo $form[$name]->renderError() ?>
    <div>
    	<?php if($name!="photo"):?>
		      <?php echo $form[$name]->renderLabel($label) ?>
      	<?php endif;?>	

      <div class="content">
      	<?php if($name=="photo"):?>
      		<img src="<?php echo $form[$name]->getValue()?>"/>
      	<?php else:?>	
      		<?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
      	<?php endif;?>
      </div>

      <?php if ($help): ?>
        <div class="help"><?php echo __($help, array(), 'messages') ?></div>
      <?php elseif ($help = $form[$name]->renderHelp()): ?>
        <div class="help"><?php echo $help ?></div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
