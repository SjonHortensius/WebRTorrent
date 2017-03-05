<h1>Torrents</h1>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Size</th>
				<th>Done</th>
			</tr>
		</thead>
		<tbody>
<?foreach ($this->list as $t):?>
			<tr>
				<td><?=$t->name?></td>
				<td><?=$t->size_bytes?></td>
				<td><?=$t->bytes_done?></td>
			</tr>
<?endforeach?>
		</tbody>
	</table>
</div>
