<?php
$strJsonFileContents = file_get_contents("../config.json");
$array = json_decode($strJsonFileContents, true);
$hostname = $array["host"];
$username = $array["user"];
$password = $array["pass"];
$databaseName = $array["database"];
$project = $array["project"];
// Create connection
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>