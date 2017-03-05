<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Size</th>
		</tr>
	</thead>
	<tbody>
<?foreach ($this->list as $h => $t):?>
		<tr>
			<td>
				<?=$t->name?>

				<div class="progress">
					<div class="progress-bar" role="progressbar" style="width: <?=round(100/max($t->size_bytes,1)*$t->bytes_done)?>%; height: 2px;" aria-valuenow="<?=$t->bytes_done?>" aria-valuemin="0" aria-valuemax="<?=$t->size_bytes?>">
					</div>
				</div>

				<ul class="actions">
<?if (!$t->is_open):?>
					<li><a class="btn btn-sm btn-primary" href="?start/<?=$h?>">start</a></li>
<?else:?>
	<?if ($t->is_open && (!$t->is_active || !$t->state)):?>
					<li><a class="btn btn-sm btn-warning" href="?pause/<?=$h?>">pause</a></li>
	<?elseif (!$t->state):?>
					<li><a class="btn btn-sm btn-info" href="?resume/<?=$h?>">resume</a></li>
	<?endif?>
					<li><a class="btn btn-sm btn-danger" href="?remove/<?=$h?>">remove</a></li>
<?endif?>
				</ul>
			</td>
			<td><?=webRTorrent::binaryPrefix($t->size_bytes, 0, '%.0f %sb')?></td>
		</tr>
<?endforeach?>
	</tbody>
</table>
