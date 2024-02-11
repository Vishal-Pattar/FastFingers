<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'cms');

class Database {
    private $connection;

    function __construct(){
        $this->connect();
    }

    function connect(){
        $this->connection = @mysqli_connect(SERVER, USERNAME, PASSWORD) or die('Connection error -> ' . mysqli_connect_error());
        mysqli_select_db($this->connection, DATABASE) or die('Database error -> ' . mysqli_error($this->connection));
    }

    function run_query($query) {
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die('Query error -> ' . mysqli_error($this->connection));
        }
        return $result;
    }

    function close_connection() {
        mysqli_close($this->connection);
    }
}
?>
