<?php
	require("header.php");
	require("connection.php");
?>

	<div class="container main">
		<h1 class="jumbotron">Register</h1>
		<form class="navbar-form">
			<div  class="form-group">
				<input type="text" placeholder="First Name" name="first_name" class="form-control my-form-control">
				<input type="text" placeholder="Last Name" name="last_name" class="form-control my-form-control">
				<input type="text" placeholder="Email" name="email" class="form-control my-form-control">
				<input type="submit " value="Register" class="btn btn-primary">
			</div>
		</form>
	</div>

<?php
	include("footer.php");
?>