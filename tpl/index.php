<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Size</th>
		</tr>
	</thead>
	<tbody>
<?foreach ($this->list as $i => $t):?>
		<tr>
			<td>
				<?=$t->name?>

				<div class="progress">
					<div class="progress-bar" role="progressbar" style="width: <?=round(100/max($t->size_bytes,1)*$t->bytes_done)?>%; height: 2px;" aria-valuenow="<?=$t->bytes_done?>" aria-valuemin="0" aria-valuemax="<?=$t->size_bytes?>">
					</div>
				</div>

				<ul class="actions">
<?if($t->state == 'pause'):?>
					<li><a class="btn btn-sm btn-info" href="?resume/<?=$i?>">resume</a></li>
<?else:?>
					<li><a class="btn btn-sm btn-warning" href="?pause/<?=$i?>">pause</a></li>
<?endif?>

<?if($t->state == 'stop'):?>
					<li><a class="btn btn-sm btn-primary" href="?start/<?=$i?>">start</a></li>
<?else:?>
					<li><a class="btn btn-sm btn-danger" href="?remove/<?=$i?>">remove</a></li>
<?endif?>
				</ul>
			</td>
			<td><?=webRTorrent::binaryPrefix($t->size_bytes, 0, '%.0f %sb')?></td>
		</tr>
<?endforeach?>
	</tbody>
</table>
