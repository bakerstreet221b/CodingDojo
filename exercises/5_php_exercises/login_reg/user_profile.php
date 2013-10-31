<?php
	session_start();

	require_once('connection.php');

	$user = fetchRecord("SELECT * FROM users WHERE users.id = ' ".$_GET['id']."' ");

	$users = fetchAll("SELECT *FROM users");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class='navbar navbar-inverse'>
		<div class='container'>
			<div class='header'>
				<div class='navbar-brand'>Profile</div>
			</div>
			<div class='collaps navbar-collaps'>
				<ul class='nav navbar-nav'>
					<li class=''>
						<a href="process.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class='container'>
		<h2>
			<?php
				echo $user['email'];
			?>
		</h2>
	</div>

</body>
</html>	












