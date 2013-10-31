<?php 
	session_start();
	require("connection.php");

	
	if (isset($_POST['delete_all']))
	{
			

		$query = "TRUNCATE TABLE tasks";
		mysql_query($query);
		
		header("location:/index.php");			
	}		


	if (isset($_POST['building'])) 
	{

		$building = $_POST['building'];
		

		if ($building == 'farm') 
		{
			$gold = rand(10, 20);
		}
		elseif ($building == 'cave') 
		{
			$gold = rand(5, 10);
		}
		elseif ($building == 'house') 
		{
			$gold = rand(2, 5);
		}
		else 
		{
			$luck = rand(1,100);
			if ($luck > 30) 
			{
				$gold = rand(0,50);
			}
			else
			{
				$gold = rand(-50, 0);
			}
		}

		
		$query = "INSERT INTO tasks (type_of_task, earnings, created_at) VALUES ('{$building}','{$gold}', NOW())";
		mysql_query($query);
		

		if ($gold < 0) 
		{
			$message = 'You entered a casino and lost '.$gold.' golds...Ouch.';
		}
		else
		{
			$message = 'You entered a '.$building.' and earned '.$gold.' golds.';
		}

		$_SESSION['messages'] = $message;
		header("location:/index.php");
	}
?>