<?php
	session_start();
	require_once('connection.php');

	if (!isset($_SESSION['logged_in'])) 
	{
		header('location: login.php');
	}

	$query = fetchAll("SELECT t1.message, t1.id, t2.first_name, t2.last_name FROM messages as t1 LEFT JOIN users as t2 on t1.user_id = t2.id ORDER BY t1.id DESC");
	$messages = $query;

	$query = fetchAll("SELECT t1.comment, t1.message_id, t2.first_name, t2.last_name FROM comments as t1 LEFT JOIN users as t2 on t1.user_id = t2.id ORDER BY t1.id ASC");
	$comments = $query;
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<title>CodingDojo Wall</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<style type="text/css">
	textarea {
		width: 100%;
	}
	.container {
		width: 960px;
	}
	.btn {
		float: right;
	}
	.indent_sm {
		margin-left: 10px;
	}
	.indent {
		margin-left: 20px;
		max-width: 960px;
	}
	</style>
</head>
<body>
	<div class='navbar navbar-inverse'>
		<div class='container'>
			<div class='navbar-header'>
				<a class='navbar-brand' href="#">CodingDojo Wall</a>
			</div>
			<div class='navbar-collaps collaps'>
				<ul class='nav navbar-nav navbar-right'>
					<li><a href="">Welcome <?php echo $_SESSION['user'] ?></a></li>
					<li><a href="process.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class='container'>
		<form action='process.php' method='post'>
			<input type='hidden' name='action' value='message'>
			<div class='form-group'>
				<label for='message'>Post a Message</label>
				<textarea autofocus='autofocus' id='message' rows='4' name='message'></textarea>
			</div>
			<div class='form-group'>
				<input type='submit' class='btn btn-primary' value='Submit' name='submit'>
			</div>
		</form>	
	<?php
	if (isset($messages)) 
	{
		foreach ($messages as $message) {
			echo '<hr><div><h4>'.$message['first_name'].' '.$message['last_name'].'</h4><p class="indent_sm">'.$message['message'].'</p></div>';

			if (isset($comments)) 
			{
				foreach ($comments as $comment) 
				{
					if ($message['id'] == $comment['message_id']) 
					{
						echo '<div class="indent"><h5>'.$comment['first_name'].' '.$comment['last_name'].'</h5><p>'.$comment['comment'].'</p></div>';
					}
				}
			}
			echo "<div class='indent'><form action='process.php' method='post'><input type='hidden' name='action' value='comment'><input type='hidden' name='meid' value='".$message['id']."'><div class='form-group'><label for='comment'>Post a Comment</label><textarea id='comment' rows='2' name='comment'></textarea></div><div class='form-group'><input type='submit' class='btn btn-success' value='Submit' name='submit'></div></form></div>";
		}
	}
	?>
	</div>
	<div class='container'>
		<footer><hr>By Thereza Sscherrer, 2013</footer>
	</div>

</body>
</html>	