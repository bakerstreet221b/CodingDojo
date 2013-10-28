<?php
	session_start();

	
	
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
				<a class="navbar-brand" href="#">Login</a>
			</div>
		</div>
	</div>	
	<div class="container">
		<?php
			if(isset($_SESSION['messages'])) 
			{	
			echo "<div id='validation'>". $_SESSION['messages'] . "</div>";
			unset($_SESSION['messages']);
			};
		?>
		<h2>Please enter your email address</h2>
		<form class="navbar-form" action="process.php" method="post">
			<div class="form-group">
				<input type="text" placeholder="Email" class="form-control" name="email">
			</div> 
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	
</body>
</html>