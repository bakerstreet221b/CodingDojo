<?php
	session_start();
	include('connection.php');
    include('friend.php');

    $person = Person::currentUser();

	if (!isset($_SESSION['logged_in'])) {
		header('Location: login.php');
	};
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $person->becomeFriendsWith($_POST['action']);
      exit();
    }
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Friends Finder</title>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css">
	<style type="text/css">
        #form {
            float: right;
        }
        .container {
            width: 960px;
        }
        h2 {
            padding-left: 15px;
        }
    </style>
	<script type="text/javascript">

    </script>
</head>
<body>
	<div class='container'>
		<div class='jumbotron'><h1>Friends Finder</h1></div>
        <?php
        // if (isset($_SESSION['messages'])) {
        //     foreach ($_SESSION['messages'] as $message) {
        //         echo "<div class='alert alert-success'>".$message."</div>";
        //     }
        //     unset($_SESSION['messages']);
        // };
        ?>
		<div class='box' id='greeting'>
            <form action='process.php' method='post' role='form' id='form'>
                <div id='form-group'>
                <input type='submit' value='Log off' class='btn btn-danger'>
                </div>
            </form>
            <?php
                echo "<h3>Welcome ".$_SESSION['first_name']."<br>".$_SESSION['email']."</h3>";
            ?>
		</div>
		<div class='row'>
			<h2>List of Friends</h2>
            <div class='col-md-6'>
            <?php
            function friendsTable($users)
            {
                $html = "<table class='table table-bordered'><thead><tr><th>Name</th><th>Email</th></tr></thead><tbody>";
                foreach($users as $user)
                {
                    $html .= "<tr><td>".$user->name."</td>";
                    $html .= "<td>".$user->email."</td></tr>";
                }
                $html .= "</tbody></table>";
                echo $html;
            }
            $friends = $person->getAllFriends();

            if(count($friends) > 0) {
                friendsTable($friends);
            }
            else
            {
                echo "<div class='alert alert-info'>No friends added yet.</div>";
            }
            ?>
            </div>
		</div>
		<div class='row'>
			<h2>List of Users who subscribe to Friends Finder</h2>
            <div class='col-md-7'>
            <?php
            function usersTable($users)
            {
                $html = "<table class='table table-bordered'><thead><tr><th>Name</th><th>Email</th><th>Action</th></tr></thead><tbody>";
                foreach($users as $user)
                {
                    $html .= "<tr><td>".$user->name."</td>";
                    $html .= "<td>".$user->email."</td>";
                    if($user->is_friend == 0)
                    {
                        $html .= "<td><form action='home.php' method='post'><input type='hidden' name='action' value='".$user->id."'><input type='submit' value='Add as Friend' class='btn btn-success btn-sm'></form></td></tr>";
                    }
                    else
                    {
                        $html .= "<td>Friends</td></tr>";
                    }
                }

                $html .= "</tbody></table>";
                echo $html;
            }
            $users = $person->getEverybody();

            usersTable($users);

            ?>
            </div>
		</div>
        <hr>
		<footer>Made with love by Thereza, 2013</footer><br>
	</div>
</body>
</html>