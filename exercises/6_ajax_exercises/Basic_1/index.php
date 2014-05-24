<?php
	require('connection.php');


	$posts = fetch_all("SELECT * FROM notes");


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
	div {
		display: inline-block;
		margin: 10px;
		text-align: center;
	}
	h4 {
		background-color: #FFDE00;
		margin-bottom: 0;
		padding: 10px;
	}
	textarea {
		margin-bottom: 10px;
	}
	.box {
		padding: 10px;
		height: 350px;
		width: 204px;
		vertical-align: top;
	}
	.box h4 {
		border: 1px solid #FFDE00;
		background-color: #FFE533;
		margin: 0 2px;
	}

	.del_form .btn {
		float: left;
	}
	.edit_form .btn {
		float: right;
	}
	.postit {
		border: 1px solid #FFDE00;
		background-color: #FFED73;
		font-family: courier;
		font-size: 12px;
		height: 200px;
		width:  180px;
		margin: 0 -20px 10px -20px;
		padding: 10px;
		text-align: center;
	}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){

			$(document).on("submit", '.del_form', function(){
				var form = $(this);
				$.post(
					$(this).attr('action'), $(this).serialize(), function(data){
						$(form.parent()).remove();
					}, "json");
				return false;
			});

			$(document).on("click", ".postit", function(){
				var divHtml = $(this).html();
			    var editableText = $("<textarea rows='10' cols='26' name='description' class='textarea'></textarea>");
			    editableText.val(divHtml);
			    $(this).replaceWith(editableText);
			    editableText.focus();
			})


			$(document).on ("submit", '#post_its', function(){
				var form = $(this);
				$.post(
					$(this).attr('action'), $(this).serialize(), function(param){
						$('#box').append(param.html);
						$(form).each(function(){
							this.reset();
						})
					}, "json");
				return false;
			});

			$(document).on("submit", '.edit_form', function(){
				$.post(
					$(this).attr('action'), $(this).serialize(), function(data){
						if (data == "updated") {
							var html = $(".textarea").val();
				    		var viewableText = $("<div class='postit'></div>");
				    		viewableText.html(html);
				    		$(".textarea").replaceWith(viewableText);
				    	};
					}, "json");
				var html = $(this).val();
				return false;
			});
		});
	</script>
</head>
<body>
	<div class='container'>
		<h1>My Posts:</h1>
		<div id='box'>
		<?php
			foreach ($posts as $post) {
				echo "<div class='box'>
					<h4 class='title'>".$post['title']."</h4>
					<form action='process.php' method='post' id='edit_form' class='edit_form' >
					<div id='".$post['id']."' class='postit'>".$post['description']."</div>

						<input type='hidden' name='note_id' value='".$post['id']."'>
						<input type='hidden' name='action' value='edit_note'>
						<input type='submit' class='btn btn-default btn-sm edit' value='edit'>
				 	</form>
					<form action='process.php' method='post' id='del_form' class='del_form' >
						<input type='hidden' name='note_id' value='".$post['id']."'>
						<input type='hidden' name='action' value='delete_note'>
						<input type='submit' class='btn btn-default btn-sm' value='delete'>
					</form>
					</div>";
			};

		?>

		</div>
		<form class='navbar' action='process.php' method='post' id='post_its'>
			<div class='form-group'>
			<input class='form-control' id='title_input' type='text' placeholder='Insert note title here: ' name='title'>
			</div>
			<input type='hidden' name='action' value='post_note'>
			<input class='btn btn-primary' type='submit' id='title_submit' value='Post It!'>
		</form>
		<form action='process.php' method='post'><input type='hidden' name='action' value='delete_all'><input class='btn btn-danger' type='submit' value='Delete All' name='delete'></form>
	<hr>
	<footer>Made with love by Thereza, 2013</footer>
	</div>
</body>
</html>