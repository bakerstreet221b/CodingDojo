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
	<div class="container">
		<h2>
			<div class="alert alert-success">Thanks for submitting your information.</div>
		<?php
			if(isset($_SESSION['messages'])) 
			{	
			echo "<div". $_SESSION['messages'] . "</div>";
			};
		?>
		</h2>
	</div>	
</body>
</html>