<?php
session_start();



?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='UTF-8'>
	<link rel="stylesheet" type="text/css" href="/bootstrap.css">
	<title></title>
	<style>
	.error {
		border: 1px solid red;
	}
	</style>
</head>
<body>
<div class='container'>
	<h2>Registration Form</h2>
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
			<input type='text' class='form-control <?php if ($_SESSION["values"]["password"]) {echo "error";} ?>' placeholder='Password *' name='password'>
		</div>
		<div class='form-group'>
			<input type='text' class='form-control <?php if ($_SESSION["values"]["password"]) {echo "error";} ?>' placeholder='Confirm Password *' name='confirm_password'>
		</div>
		<div class='form-group'>
			<input type='text' class='form-control <?php if ($_SESSION["values"]["birth_date"]) {echo "error";} ?>' placeholder='Birth Date, dd-mm-yy' name='birth_date'>
		</div>
		<div class='form-group'>
			<input type='submit' class='btn btn-primary' value='Submit' name='submit'>
		</div>
	</form>
</div>
</body>
</html>

