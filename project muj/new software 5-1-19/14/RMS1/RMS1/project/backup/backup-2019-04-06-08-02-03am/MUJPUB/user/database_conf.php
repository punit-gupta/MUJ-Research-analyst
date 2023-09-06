<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "muj";
// Create connection
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>