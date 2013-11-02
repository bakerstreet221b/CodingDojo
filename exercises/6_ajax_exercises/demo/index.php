<?php
	require("connection.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Ajax - lead example</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.min.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	 <script type="text/javascript">
	 	$(document).ready(function(){
	 		$('.datepicker').datepicker();	
	 		 		
	 		$('#search_text').keyup(function(){
	 			$('#test_form').submit();
	 		});

	 		$('#test_form').submit(function(){
	 			$.post(
					$(this).attr('action'), $(this).serialize(), function(data){
						$('#results').html(data.html);
					}, 'json');
	 			
	 			return false;
	 		});
	 		$('#test_form').submit();
	 	});
	 </script>
</head>
<body>
	<div class='container'>
		<form class='navbar-form' id='test_form' action='process.php' method='post'>
			<div class='form-group'>
			<input class='form-control' id='search_text' type='text' placeholder='Name' name='name'>
			</div>
			<div class='form-group'>
			<input class='form-control datepicker' type='text' placeholder='From' name='from_date'>
			</div>
			<div class='form-group'>
			<input class='form-control datepicker' type='text' placeholder='To' name='to_date'>
			</div>
			<input class='btn btn-success' type='submit' value='Submit'>
		</form>
		
	</div>
	<div class='container'>
		<div id='results'>
		</div>
	</div>

</body>
</html>