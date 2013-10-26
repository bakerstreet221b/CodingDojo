<?php
	session_start();


	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) AND $_POST['password'] != '') 
	{
		$message = "Logged in!";
	} 
	else 
	{
		$message = 'Error. Incorrect Email or Password.';
	};

	$_SESSION['messages'] = $message;

	header("location: exercise.php");
	
?>