<?foreach ($this->list as $h => $t):?>
<div class="row no-gutters">
	<div class="col-10">
		<?=$t->name?>

		<div class="progress">
			<div class="progress-bar" role="progressbar" style="width: <?=round(100/max($t->size_bytes,1)*$t->bytes_done)?>%; height: 2px;" aria-valuenow="<?=$t->bytes_done?>" aria-valuemin="0" aria-valuemax="<?=$t->size_bytes?>">
			</div>
		</div>

		<form method="post" action="?toggle/<?=$h?>">
<?if (!$t->is_open):?>
			<button class="btn btn-sm btn-outline-primary" type="submit" name="state" value="start">start</button>
<?else:?>
	<?if ($t->is_active && $t->state && $t->left_bytes>0):?>
			<button class="btn btn-sm btn-outline-warning" type="submit" name="state" value="pause">pause</button>
	<?elseif (!$t->state):?>
			<button class="btn btn-sm btn-outline-info" type="submit" name="state" value="resume">resume</button>
	<?endif?>
			<button class="btn btn-sm btn-outline-danger" type="submit" name="state" value="remove">remove</button>
<?endif?>
		</form>
	</div>
	<div class="col-2">
		<?=webRTorrent::binaryPrefix($t->size_bytes, 0, '%.0f %sb')?>
		<?=$t->peers_connected?>&nbsp;peer<?=(1==$t->peers_connected)?'':'s'?>
	</div>
</div>
<?endforeach?>
