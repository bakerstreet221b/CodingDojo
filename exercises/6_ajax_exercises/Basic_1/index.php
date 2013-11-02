<?php
	require('connection.php');

	

	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<title>My Posts</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.min.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<style type="text/css">
	#box {
		float: overflow;
	}
	.postit {
		border: 1px solid black;
		background-color: yellow;
		height: 150px;
		width:  150px;
		margin: 10px;
		text-align: center;
		float: left;
	}
	.float_right {
		float: right;
	}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('#post_its').submit(function(){
				$.post(
					$(this).attr('action'), $(this).serialize(), function(data){
						$('#box').html(data.html);						
					}, "json");
				return false;
			});
			$('#post_its').submit();
		});
	</script>
</head>
<body>
	<div class='container'>
		<h1>My Posts:</h1>	
		<div id='box'></div>
		<form class='navbar' action='process.php' method='post' id='post_its'>
			<div class='form-group'>
			<textarea class='form-control' type='text' placeholder='Add a note:' name='note'></textarea>
			</div>
			<input class='btn btn-primary' type='submit' value='Post It!'>
		</form>
		<form action='process.php' method='post'><input class='btn btn-danger' type='submit' value='Delete All' name='delete'></form>
	<hr>
	<footer>by Thereza Scherrer, 2013</footer>
	</div>
</body>
</html>