<?php
class Person {

    private $data; // associative array
    private $connection;

    function __construct($data) {
        // Make sure object is initialized into a valid state
        assert(isset($data['id']));
        $this->data = $data;
        $this->connection = new Database();
    }

    static function currentUser() {
        // Returns a new object with current user
        return new Person(array('id' => $_SESSION['id']));
    }

    function getAllFriends() {
        // Return array with all friends as Person objects
        $query = "SELECT id, concat(t1.first_name,' ' , t1.last_name) as name, t1.email
            FROM users as t1
            LEFT JOIN friends as t2
            on t1.id = t2.friend_id
            WHERE t2.user_id =".$this->data['id'];
        $people = $this->connection->fetch_all($query);
        return array_map(function($data) { return new Person($data); }, $people);
    }

    function getEverybody() {
        // Return array with everybody as Person objects with is_friend property
        $query =
            "SELECT
                id,
                concat(first_name,' ' , last_name) AS name,
                email,
                (select count(*) from friends where user_id = id and friend_id = ".$this->id.") AS is_friend
            FROM users WHERE NOT id = ".$this->id;
        $people = $this->connection->fetch_all($query);
        return array_map(function($data) { return new Person($data); }, $people);
    }

    function becomeFriendsWith($person) {
        // Creates new friendship between this and other person
        $query = "INSERT INTO friends (friend_id, user_id) VALUES ('{$person}','".$this->data['id']."')";
        $query2 = "INSERT INTO friends (friend_id, user_id) VALUES ('".$this->data['id']."','{$person}')";
        mysql_query($query);
        mysql_query($query2);

        header('location: home.php');
    }

    function __get($name) {
        // Returns a property, one of id, name, email, or is_friend
        return $this->data[$name];
    }

}

