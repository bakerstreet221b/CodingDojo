<?php
    // include('connection.php');
    // session_start();

class Comment {

    // private $data; // associative array
    private $connection;

    function __construct() {
        // Make sure object is initialized into a valid state
        // assert(isset($data['id']));
        // $this->data = $data;
        $this->connection = new Database();
    }

    function processFormData($data) {

        if (isset($data['action']) && $data['action'] == 'comment')
        {
            $this->insertComment($data['pic_id'], $data['user_id'], $data['comment']);
        }
    }

    // static function currentUser() {
    //     // Returns a new object with current user
    //     return new Comment(array('id' => $_SESSION['id']));
    // }

    function getComments($pic_id) {
        // Return array with everybody as Person objects with is_friend property
        $query =
            "SELECT id, comment, (select user_name from users where user_id = id ) AS user FROM comments WHERE pic_id = ".$pic_id;
            // echo $query;
        $comments = $this->connection->fetch_all($query);
        // return array_map(function($data) { return new Comment($data); }, $comments);
        return $comments;
    }

    function insertComment($pic_id, $user_id, $comment) {
        $query = "INSERT INTO comments (pic_id, user_id, comment) VALUES ('".$pic_id."','".$user_id."','".$comment."')";
        mysql_query($query);

        $messages[] = "Comment was successful";
        $_SESSION['messages'] = $messages;

    }

    // function __get($name) {
    //     // Returns a property, one of id, name, email, or is_friend
    //     return $this->data[$name];
    // }

}
