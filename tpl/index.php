<h1>Torrents</h1>

<!--section class="row text-center placeholders">
	<div class="col-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
		<h4>Label</h4>
		<div class="text-muted">Something else</div>
	</div>
	<div class="col-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
		<h4>Label</h4>
		<span class="text-muted">Something else</span>
	</div>
	<div class="col-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
		<h4>Label</h4>
		<span class="text-muted">Something else</span>
	</div>
	<div class="col-6 col-sm-3 placeholder">
		<img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
		<h4>Label</h4>
		<span class="text-muted">Something else</span>
	</div>
</section-->

<h2>Section title</h2>
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
