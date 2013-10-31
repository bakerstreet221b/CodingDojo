<?php
session_start();

require_once('connection.php');


if (isset($_POST['action']) && $_POST['action'] == "register") 
{
	registerAction();
} 
elseif (isset($_POST['action']) && $_POST['action'] == "login") 
{
	loginAction();
}
else
{
	session_destroy();
	header('location: index.php');
}

function loginAction ()
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$user_info = fetchRecord("SELECT * FROM users WHERE users.email = '".$email."' AND users.password = '".$password."'");

	if ($user_info != NULL) 
	{
		$_SESSION['id'] = $user_info['id'];
		$_SESSION['email'] = $user_info['email'];
		$_SESSION['logged_in'] = TRUE;


		if ($_SESSION['logged_in'] === TRUE) 
		{
			header('location: user_profile.php?id='.$_SESSION['id']);
		}
	}
	else
	{
		$_SESSSION['errors'][] = "Invalid email of password";
		header('location: index.php');
	}
}

function registerAction()
{
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$birth_date = $_POST['birth_date'];


	if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) 
	{
		$_SESSION['errors'][] = "Oops... email is NOT valid";
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
	else
	{
		$birth_date = 0;
	}
	

	if (!isset($_SESSION['errors'])) 
	{
		$check_user = fetchRecord("SELECT * FROM users WHERE users.email = '".$_POST['email']."'");

		if($check_user == NULL)
		{			
			$new_user = mysql_query("INSERT INTO users (email, password, first_name, last_name, birth_date, created_at) VALUES ('{$email}','{$password}','{$first_name}','{$last_name}','{$birth_date}', NOW() )");

			$_SESSION['registered'] = $_POST['email'];
			header('location: login.php');
		}
		else
		{
			$_SESSION['errors'][] = "Email ".$_POST['email']." alredy in use";
			header('location: index.php');
		}	
	}
	else
	{
		header('location: index.php');
	}


}












?>