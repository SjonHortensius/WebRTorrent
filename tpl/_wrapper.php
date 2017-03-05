<!DOCTYPE html>
<html lang="en">
	<head>
		<title>webRTorrent</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="static/bootstrap.min.css" rel="stylesheet">
		<link href="static/dashboard.css" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
			<button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#">webRTorrent</a>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Torrents <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help</a>
					</li>
				</ul>
				<form class="form-inline mt-2 mt-md-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
					<form class="form-inline mt-2 mt-md-0" action="?action=add" method="post">
						<input class="form-control mr-sm-2" type="text" placeholder="Magnet" name="magnet" pattern="magnet:\?xt=urn:btih:[a-zA-Z0-9]{32,40}&.*">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add</button>
					</form>

					<ul class="nav nav-pills flex-column">
						<li class="nav-item">
							<a class="nav-link active" href="#">Main<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Started</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Stopped</a>
						</li>
					</ul>

					<ul class="nav nav-pills flex-column">
						<li class="nav-item">
							<a class="nav-link" href="#">Complete</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Incomplete</a>
						</li>
					</ul>

					<ul class="nav nav-pills flex-column">
						<li class="nav-item">
							<a class="nav-link" href="#">Hashing</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Seeding</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Leeching</a>
						</li>
					</ul>
				</nav>

				<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<?=$this->content?>
				</main>
			</div>
		</div>
</html>
