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
elseif (isset($_POST['action']) && $_POST['action'] == "message")
{
	messageAction();
}
elseif (isset($_POST['action']) && $_POST['action'] == "comment")
{
	commentAction();
}
else
{
	session_destroy();
	header('location: login.php');
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
		$_SESSION['user'] = $user_info['first_name'];
		$_SESSION['logged_in'] = TRUE;


		if ($_SESSION['logged_in'] === TRUE) 
		{
			header('location: index.php');
		}
	}
	else
	{
		$_SESSION['errors'][] = "Invalid email or password";
		header('location: login.php');
	}
}

function registerAction()
{
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

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

	if (!isset($_SESSION['errors'])) 
	{
		$check_user = fetchRecord("SELECT * FROM users WHERE users.email = '".$_POST['email']."'");

		if($check_user == NULL)
		{			
			$new_user = mysql_query("INSERT INTO users (email, password, first_name, last_name, created_at) VALUES ('".mysql_real_escape_string($email)."','".mysql_real_escape_string($password)."','".mysql_real_escape_string($first_name)."','".mysql_real_escape_string($last_name)."', NOW() )");

			$_SESSION['registered'] = $_POST['email'];
			header('location: login.php');
		}
		else
		{
			$_SESSION['errors'][] = "Email ".$_POST['email']." alredy in use";
			header('location: register.php');
		}	
	}
	else
	{
		header('location: register.php');
	}


}

function messageAction()
{
	if (isset($_POST['message'])) 
	{
		$user_id = $_SESSION['id'];
		$message = $_POST['message'];

		$query = "INSERT INTO messages (message, user_id, created_at) VALUES ('".mysql_real_escape_string($message)."', '".mysql_real_escape_string($user_id)."', NOW())";
		mysql_query($query);
		}

		header('location: index.php'); 	
}

function commentAction()
{
	

	$user_id = $_SESSION['id'];
	$comment = $_POST['comment'];

	$message_id = $_POST['meid'];

	$query = "INSERT INTO comments (message_id, user_id, comment, created_at) VALUES ('".mysql_real_escape_string($message_id)."', '".mysql_real_escape_string($user_id)."', '".mysql_real_escape_string($comment)."', NOW())";
	mysql_query($query);

	header('location: index.php'); 	
}










?>