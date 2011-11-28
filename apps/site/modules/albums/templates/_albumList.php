<?php foreach ($albums as $album): ?>
<div>
<button id="createAlbum">Crear Album</button>
</div>
<table>
	<tbody>
		<tr>
			<td><?php echo $album->getName() ?></td>
			<td><?php echo $album->getCreatedAt() ?></td>
			<td><?php echo $album->getUpdatedAt() ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<div class="pagination_desc">
	<strong><?php echo count($pager) ?> </strong> jobs in this category

	<?php if ($pager->haveToPaginate()): ?>
	- page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?>
	</strong>
	<?php endif; ?>
</div>

<div id="newForm">
	<form class="album-form" method="post"
		action="<?php echo url_for("albums/new")?>">
		<dl>
			<dt>
				<label for="<?php echo $form['name']->renderId() ?>"
				<?php echo $form['name']->hasError() ? ' class="error"' : '' ?>>Nombre:</label>
			</dt>
			<dd>
			<?php echo $form["name"]->render()?>
			</dd>
		</dl>
	</form>
</div>
