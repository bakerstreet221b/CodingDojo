<?php
session_start();

if (isset($_SESSION['logged_in'])) 
{
	header('location: index.php');
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='UTF-8'>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>Login Form</title>
	<style>
	.error {
		border: 1px solid red;
	}
	.form-control {
		width: 50%;
	}
	</style>
</head>
<body>
<div class='container'>
	<h2>Login <a href="register.php">or register</a></h2>
	<?php
		if(isset($_SESSION['errors'])) 
		{
			foreach ($_SESSION['errors'] as $error) 
			{
				echo "<div class='alert alert-danger'>". $error . "</div>";
			}
		unset($_SESSION['errors']);
		};

		if(isset($_SESSION['registered']))
		{
			echo "<div class='alert alert-success'>".$_SESSION['registered']." successfully registered</div>";
			unset($_SESSION['registered']);
		}
		?>
	<p>All fields marked with * are required</p>
	<form class='nav' action='process.php' method='post'>
		<input type='hidden' name='action' value='login'>
		<div class='form-group'>
			<input type='text' class='form-control <?php if ($_SESSION["values"]["email"]) {echo "error";} ?>' id='email' placeholder='Email *' name='email'> 
		</div>
		<div class='form-group'>
			<input type='password' class='form-control <?php if ($_SESSION["values"]["password"]) {echo "error";} ?>' placeholder='Password *' name='password'>
		</div>
		<div class='form-group'>
			<input type='submit' class='btn btn-primary' value='Login' name='submit'>
		</div>
	</form>
</div>
</body>
</html>

