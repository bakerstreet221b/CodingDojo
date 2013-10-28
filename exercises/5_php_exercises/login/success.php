<?php
	session_start();

	require_once('connection.php');
	$users = fetchAll("SELECT *, DATE_FORMAT(created_at, '%d/%m/%y %l:%i %p') as date FROM users ORDER BY user_id DESC");
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap.css" />
	<link rel="stylesheet" href="../dist/js/bootstrap.js" />
</head>
<body>	
	<div class="navbar navbar-inverse">
		<div class="container">	
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Email Success</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="index.php">login</a>
					</li>
				</ul>
			</div>
		</div>
	</div>	
	<div class="container">
		
			<?php
			if(isset($_SESSION['messages'])) 
			{	
			echo "<div id='validation'>". $_SESSION['messages'] . "</div>";
			};
			?>

		
		<div class='table'>
			<table><thead><tr><th>Email Address entered</th></tr></thead><tbody>
				<?php
					foreach ($users as $user) {
						echo "<tr><td>".$user['email']."</td><td>".$user['date']."</td><td><form action='process.php' method='post'>
							<input type='hidden' value=".$user['user_id']." class='btn btn-danger' name='delete'>
							<input type='submit' class='btn btn-danger' value='Delete'>
						</td></tr>";
					}
				?>
			</tbody></table>
		</div>
	</div>
	
</body>
</html>