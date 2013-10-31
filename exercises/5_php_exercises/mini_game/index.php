<?php
	session_start();
	require("connection.php");

	$tasks = fetchAll("SELECT *, date_format(created_at, '%M %D %Y %l:%i %p') as date FROM tasks ORDER BY task_id DESC");
	$total = fetchAll("SELECT sum(earnings) as total FROM tasks");
?>
<!DOCTYPE HTML>
<html>
<head lang='en-US'>
	<meta charset='UTF-8'>
	<title>Make Money!!!</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<style type="text/css">
.row {
	overflow: hidden;
}
.box h3 {
	margin-top: 5px;
}
.box {
	float: left;
	margin: 35px;
	padding: 30px;
	text-align: center;
	min-height: 200px;
	width: 190px;
	border: 2px solid #CCCCCC;
}
.box_a {
	width: 960px;
	text-align: left;
	max-height: 500px;
}
.red {
	color: red;
}
.green {
	color: green;
}
/*.container {
	border: 1px solid red;
}*/

	</style>
</head>
<body>
	<div class='container'>
		<div class='header'>
			<form action='process.php' method='post'>
				<h1>Play the Ninja mini game!
					<input type='hidden'  name='delete_all'>
					<input class='btn btn-danger' type='submit' value='Delete all'>
				</h1>
			</form>
			<div>
				<h2>Your Gold:  
					<button>
					<?php								
						foreach ($total as $tots) 
						{
							if ($tots['total'] > 0) 
							{
								echo $tots['total'];
							}
							else
							{
								echo '0';
							}
						};															
					?>
					</button>
				</h2>
			</div>
		</div>
		<div class='row'>
			<div class='box'>
				<h3>Farm</h3>
				<p>(earns 10-20 golds)</p>
				<br>
				<form action='process.php' method='post'>
					<input type='hidden' name='building' value='farm'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
			<div class='box'>
				<h3>Cave</h3>
				<p>(earns 5-10 golds)</p>
				<br>
				<form action='process.php' method='post'>
					<input type='hidden' name='building' value='cave'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
			<div class='box'>
				<h3>House</h3>
				<p>(earns 2-5 golds)</p>
				<br>
				<form action='process.php' method='post'>
					<input type='hidden' name='building' value='house'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
			<div class='box'>
				<h3>Casino</h3>
				<p>(earns/takes 0 - 50 golds)</p>
				<br>
				<form action='process.php' method='post'>
					<input type='hidden' name='building' value='casino'>
					<input type='submit' value='Find Gold!'>
				</form>
			</div>
		</div>
		<p>Activities:</p>
		<div class='row'>
			<div class='container box box_a'>
			<?php
				foreach ($tasks as $task) {
					if ($task['earnings'] < 0) {
						echo "<div class='red'>You entered a ".$task['type_of_task']." and lost ".$task['earnings']." golds... Ouch. ".$task['date']."</div>";
					}
					else
					{
						echo "<div class='green'>You entered a ".$task['type_of_task']." and earned ".$task['earnings']." golds. ".$task['date']."</div>";
					}
				}
			?>
			</div>
		</div>
	</div>
</body>
</html>
