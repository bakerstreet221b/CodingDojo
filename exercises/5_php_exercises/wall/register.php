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
	<title>Registration Form</title>
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
	<h2>Registration Form <a href="login.php">or login</a></h2>
	<?php
		if(isset($_SESSION['errors'])) 
		{
			foreach ($_SESSION['errors'] as $error) 
			{
				echo "<div class='alert alert-danger'>". $error . "</div>";
			}
		unset($_SESSION['errors']);
		};
		?>
	<p>All fields marked with * are required</p>
	<form class='nav' action='process.php' method='post'>
		<input type='hidden' name='action' value='register'>
		<div class='form-group'>
			<input type='text' class='form-control <?php if ($_SESSION["values"]["email"]) {echo "error";} ?>' id='email' placeholder='Email *' name='email'> 
		</div>
		<div class='form-group'>
			<input type='text' class='form-control <?php if ($_SESSION["values"]["first_name"]) {echo "error";} ?>' placeholder='First Name *' name='first_name'>
		</div>
		<div class='form-group'>
			<input type='text' class='form-control <?php if ($_SESSION["values"]["last_name"]) {echo "error";} ?>' placeholder='Last Name *' name='last_name'>
		</div>
		<div class='form-group'>
			<input type='password' class='form-control <?php if ($_SESSION["values"]["password"]) {echo "error";} ?>' placeholder='Password *' name='password'>
		</div>
		<div class='form-group'>
			<input type='password' class='form-control <?php if ($_SESSION["values"]["password"]) {echo "error";} ?>' placeholder='Confirm Password *' name='confirm_password'>
		</div>
		<div class='form-group'>
			<input type='submit' class='btn btn-primary' value='Submit' name='submit'>
		</div>
	</form>
</div>
</body>
</html>

