<?php
	require("connection.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Ajax - lead example</title>
	<link rel="stylesheet" type="text/css" href="../Basic_1/bootstrap.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.min.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<style type="text/css">

	</style>
	<script type="text/javascript">
	 	$(document).ready(function(){

	 		$('.datepicker').datepicker({

			    onSelect: function() {
			    	$('#test_form').submit();			        
			     }
			});	
	 				
	 		$('input').keyup(function(){
	 			$('#test_form').submit();
	 		});

	 		

	 		$('#test_form').submit(function(){
	 			$.post(
					$(this).attr('action'), $(this).serialize(), function(data){						
						

						var nums = data.page_num;
						var pages = "<div id='paginate'>";
						for (var i=1; i <= nums; i++) { 
							$('#results').html(data.html);	
							pages += "<a class='btn btn-default btn-sm' href='process.php?page="+i+"'>"+i+"</a> ";
						}
						pages += "</div>"
						
						$('#pages').html(pages);

						$('#paginate a').click("submit", function(){
				 			$.post(
								$(this).attr('href'), $('#test_form').serialize(), function(data){			
									$('#results').html(data.html);				
								}, 'json');
				 			
				 			return false;
				 		});						
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
		<div id='pages'></div>	
			
		<div id='results'>
		</div>
		<hr>
		<footer>Made with love by Thereza, 2013</footer>
	</div>

</body>
</html>