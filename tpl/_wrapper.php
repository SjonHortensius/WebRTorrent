<!DOCTYPE html>
<html lang="en">
	<head>
		<title>webRTorrent</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="static/bootstrap.min.css" rel="stylesheet">
		<link href="static/style.css" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
			<form class="form-inline mt-2 mt-md-0" action="?add" method="post">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="magnet: url" name="magnet" pattern="magnet:\?xt=urn:btih:[a-zA-Z0-9]{32,40}&.*">
					<span class="input-group-btn">
						<button class="btn btn-outline-primary" type="submit">add</button>
					</span>
				</div>
			</form>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<?=$this->content?>
				</main>
			</div>
		</div>
</html>
