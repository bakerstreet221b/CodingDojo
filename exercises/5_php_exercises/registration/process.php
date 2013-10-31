<?php
	session_start();

	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$birth_date = $_POST['birth_date'];

	function validateDate($date, $format = 'd-m-y')
	{
	    $d = DateTime::createFromFormat($format, $date);
	    return $d && $d->format($format) == $date;
	}

	$_SESSION["values"] = array(
		'email' => false,
		'first_name' => false,
		'last_name' => false,
		'password' => false,
		'birth_date' => false,
		);
	// function registerAction()
	// {
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) 
		{
			$_SESSION['errors'][] = "Invalid email";
			$_SESSION['values']['email'] = true;
		}	

		if (filter_var($first_name, FILTER_SANITIZE_NUMBER_INT) != NULL || strlen($first_name) < 1) 
		{
			$_SESSION['errors'][] = 'Oops...first name is not valid.';
			$_SESSION['values']['first_name'] = true;
		}

		if (filter_var($last_name, FILTER_SANITIZE_NUMBER_INT) != NULL || (strlen($last_name) < 1)) 
		{
			$_SESSION['errors'][] = 'Oops...last_name is not valid';
			$_SESSION['values']['last_name'] = true;
		}

		if ($password != $confirm_password || strlen($password) < 6 ) 
		{
			$_SESSION['errors'][] = "Passwords do not match or is too short!";
			$_SESSION['values']['password'] = true;
		}
		
		if ($birth_date != NULL) {
			if (validateDate($birth_date) == FALSE) 
			{
			$_SESSION['errors'][] = 'Oops...birth date is not valid.';
			$_SESSION['values']['birth_date'] = true;
			}
		}
		

		if (!isset($_SESSION['errors'])) {
			return header("location:/reg_success.php");
		}
	// }

		

	header("location:/index.php");








?>