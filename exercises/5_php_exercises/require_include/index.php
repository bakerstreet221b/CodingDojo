<?php
	require("header.php");
	require("connection.php");

	// $first_name = "Coding";
	// $last_name = "Dojo";
				
	// $query = "INSERT INTO users (first_name, last_name, created_at) VALUES ('{$first_name}', '{$last_name}', NOW())";
	// mysql_query($query);

	$query = "DELETE FROM users WHERE user_id = 8";
	mysql_query($query);			

	$query = "SELECT * FROM users ORDER BY user_id ASC";
	
	$users = fetch_all($query);


?>

	<div class="container main">
		<div class="starter-template">
			<h1>Home</h1>
			<p class="lead">Example HTML for PHP require and include functions</p>
			<p>
				<?php 
				foreach ($users as $user) {
					echo $user["user_id"] . " - " . $user["first_name"] . " " . $user["last_name"] . "<br />";
				}

				
				?>
			</p>
		</div>



	</div>

<?php
	include("footer.php");
?>