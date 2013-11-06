<?php
require('connection.php');

if(isset($_POST['action']) && $_POST['action'] == "post_note")
{
	postAction();
}
elseif(isset($_POST['action']) && $_POST['action'] == "delete_note")
{
	deleteAction();	
}
elseif(isset($_POST['action']) && $_POST['action'] == "delete_all")
{
	deleteAllAction();
}
elseif(isset($_POST['action']) && $_POST['action'] == "edit_note")
{
	postUpdateAction();
}

function deleteAction()
{
	mysql_query("DELETE FROM notes WHERE id = {$_POST['note_id']}");

	echo json_encode("deleted");
}

function deleteAllAction()
{
	if(isset($_POST['delete'])){
			$query = "truncate table notes";
			mysql_query($query);
			header('location: index.php');
		};
}

function postAction()
{
	if (isset($_POST['title']) AND $_POST['title'] != '') 
	{
		$query = "INSERT INTO notes (title, created_at) VALUES ('".$_POST['title']."', NOW())";
		mysql_query($query);
	}
		
	$posts = fetch_all("SELECT id FROM notes");
	$end = end($posts);
	$last_post = fetch_all("SELECT * FROM notes WHERE id = ".$end['id']);
	$html =	"<div class='box'>
		<h4 class='title'>".$last_post[0]['title']."</h4>
		<form action='process.php' method='post' class='edit_form' >
			<div id='".$last_post[0]['id']."' class='postit'>".$last_post[0]['description']."</div>		
			<input type='hidden' name='note_id' value='".$last_post[0]['id']."'>
			<input type='hidden' name='action' value='edit_note'>
			<input type='submit' class='btn btn-default btn-sm' value='Edit'>
		</form>
		<form action='process.php' method='post' class='del_form' >
			<input type='hidden' name='note_id' value='".$last_post[0]['id']."'>
			<input type='hidden' name='action' value='delete_note'>
			<input type='submit' class='btn btn-default btn-sm' value='Delete'>
		</form></div>";

	$data['html'] = $html;
	echo json_encode($data);
}

function postUpdateAction()
{
	if (isset($_POST['description']) AND (!empty($_POST['description']))) 
	{
		$query = "UPDATE notes SET description='{$_POST['description']}', updated_at=NOW() WHERE id=".$_POST['note_id'];
		mysql_query($query);

		echo json_encode("updated");	
	};	
	// echo json_encode("notupdated");
}
?>