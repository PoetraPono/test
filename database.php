<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "dbmawok";

$mysqli = new mysqli($host, $user, $pass, $name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>