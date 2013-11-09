<?php
	include('connection.php');
	session_start();

	class Process {

		var $connection;

		function __construct(){

			$this->connection = new Database();

			if (isset($_POST['action']) && $_POST['action'] == 'login') 
			{
				$this->loginAction(); 
			}
			elseif (isset($_POST['action']) && $_POST['action'] == 'registration') 
			{
				$this->registerAction();
			}
			else
			{				
				session_destroy();			
				header('Location: login.php');
			}
		}

		function loginAction(){
			$errors = array();

			if (!(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
				$errors[] = "Email not valid";
			}

			if (!(isset($_POST['password']) && strlen($_POST['password'])>6)){
				$errors[] = "Password not valid";
			}

			if (count($errors)>0) {
				
				$_SESSION['errors'] = $errors;
				header('Location: login.php');
			}
			else
			{
				$query = "SELECT * FROM users WHERE email='{$_POST['email']}' AND password='{$_POST['password']}'";				
				$user = $this->connection->fetch_all($query);

				if (count($user)>0){

					$_SESSION['logged_in'] = true;
					$_SESSION['id'] = $user[0]['id'];
					$_SESSION['first_name'] = $user[0]['first_name'];
					$_SESSION['last_name'] = $user[0]['last_name'];
					$_SESSION['email'] = $user[0]['email'];
					$_SESSION['messages'][] = "You've logged in successfully!";					
					header('Location: home.php?id='. $user[0]['id']);
				}
				else
				{
					$errors[] = "Email or Password not valid";
					$_SESSION['errors'] = $errors;
				}
			}
		}

		function registerAction(){
			$errors = array();
			
			if (!(isset($_POST['first_name']) && is_string($_POST['first_name']) && strlen($_POST['first_name'])>2)) {
				$errors[] = "First Name not valid";
			}

			if (!(isset($_POST['last_name']) && is_string($_POST['last_name']) && strlen($_POST['last_name'])>2)) {
				$errors[] = "Last Name not valid";				
			}

			if (!(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
				$errors[] = "Email not valid";
			}

			if (!(isset($_POST['password']) && strlen($_POST['password'])>6)) {
				$errors[] = "Password not valid";				
			}

			if (!(isset($_POST['conf_password']) && $_POST['password'] == $_POST['conf_password'])) {
				$errors[] = "Confirmed password not equal to password";				
			}

			if (count($errors) > 0){
				$_SESSION['errors'] = $errors;
				header('Location: login.php');
			}
			else
			{
				$query = "SELECT * FROM users WHERE email = '{$_POST['email']}'";
				$user = $this->connection->fetch_all($query);

				if (count($user)>0) {
					$errors[] = "Account with email ".$_POST['email']." already exists.";
					$_SESSION['errors'] = $errors;
					header('Location: login.php');
				}
				else
				{
					$query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '{$_POST['password']}', NOW())";
					mysql_query($query);

					$success[] = "Registration successfull!";
					$_SESSION['messages'] = $success;
					header('Location: login.php');	
				}
			}
		}
	}

$process = new Process();

?>