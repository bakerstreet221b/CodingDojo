<?php
	session_start();
	include('connection.php');

	if (isset($_SESSION['logged_in'])) {
		header('Location: home.php');
	};
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Friends Finder</title>
	<link rel="stylesheet" type="text/css" href="../../dist/css/bootstrap.css">
	<style type="text/css">
	#form-group {
		margin-top: 10px;
	}
	
	</style>
	<script type="text/javascript"></script>
</head>
<body>
	<div class='container'>
		<div class='jumbotron'><h1>Friends Finder</h1></div>
		<div class='row'>
<?php
	if (isset($_SESSION['errors'])) {
		foreach ($_SESSION['errors'] as $error) {
			echo "<div class='alert alert-danger'>".$error."</div>";
		}		
		unset($_SESSION['errors']);
	};

	if (isset($_SESSION['messages'])) {
		foreach ($_SESSION['messages'] as $message) {
			echo "<div class='alert alert-success'>".$message."</div>";
		}		
		unset($_SESSION['messages']);
	};
?>
		</div>
		<div class='row'>
			<div class='box col-md-6'>
				<h3>Register</h3>
				<form action='process.php' method='post' id='registration' role='form'>					
					<input type='hidden' name='action' value='registration'>					
					<div class='form-group'>
						<input type='text' placeholder='First name' name='first_name' class="form-control">
					</div>
					<div class='form-group'>
						<input type='text' placeholder='Last name' name='last_name' class="form-control">
					</div>
					<div class='form-group'>
						<input type='text' placeholder='Email' name='email' class="form-control">
					</div>
					<div class='form-group'>
						<input type='password' placeholder='Password' name='password' class="form-control">
					</div>
					<div class='form-group'>
						<input type='password' placeholder='Confirm Password' name='conf_password' class="form-control">
					</div>					
					<input type='submit' value='Register' class='btn btn-success'>
				</form>
			</div>
			<div class='box col-md-6'>
				<h3>Login</h3>
				<form action='process.php' method='post' id='login' role='form'>
					<input type='hidden' name='action' value='login'>				
					<div class='form-group'>
					<input type='text' placeholder='Email' name='email' class="form-control">
					</div>
					<div class='form-group'>
					<input type='password' placeholder='Password' name='password' class="form-control">
					</div>
					<input type='submit' value='Login' class='btn btn-success'>
				</form>
				<form action='process.php' method='post' role='form'>
					<div id='form-group'>
					<input type='submit' value='Log off' class='btn btn-danger'>
					</div>
				</form>
			</div>
		</div>
		<hr>	
		<footer>Made with love by Thereza, 2013</footer>
	</div>
</body>
</html>