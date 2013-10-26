<?php
	session_start();
 	
	$_SESSION['testing'] = "Hi";
	
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>User login</title>
</head>
<body>
<?php 
	
?>			
	<div id="wrapper">
		
			<?php
			if(isset($_SESSION['messages'])) 
			{	
			echo "<h3 id='validation' style='border:2px dotted red;padding:10px;'>". $_SESSION['messages'] . "</h3>";
			unset($_SESSION['messages']);
			};
			?>
		<form id="user_login" action="process.php" method="post">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" value="Login">
		</form>
		<footer><hr>By Thereza Scherrer, 2013</footer>
	</div>
</body>
</html>
<?php
	
?>