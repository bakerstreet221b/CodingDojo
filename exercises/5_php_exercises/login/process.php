<?php
	session_start();
	require("connection.php");

	if (isset($_POST['email'])) {
		
	
	$email = $_POST['email'];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		
		$query = "INSERT INTO users (email, created_at) VALUES ('{$email}', NOW())";
		mysql_query($query);

		header ("location:/success.php");
		$message = "<div class='alert alert-success'>The email you entered (".$email.") is a VALID email address. Thank you!</div>";

	}
	else	
	{
		header("location: index.php");
		if ($email != '') {
			$message = "<div class='alert alert-danger'>The email address you entered (".$email.") is NOT a valid email address!</div>";
		}
		else
		{
			$message = "<div class='alert alert-danger'>Oops! Sorry, this email address was empty!</div>";	
		}	
	}; 
	

	$_SESSION['messages'] = $message;
	};

	if (isset($_POST['delete'])) {
		$delete = $_POST['delete'];	
		
		$query = "DELETE FROM users WHERE user_id = $delete";
		mysql_query($query);	
		header ("location:/success.php");
		$message = "<div class='alert alert-danger'>The email just got deleted. Thank you!</div>";		
		$_SESSION['messages'] = $message;
	}

	
	
	
	
	

	
	
?>