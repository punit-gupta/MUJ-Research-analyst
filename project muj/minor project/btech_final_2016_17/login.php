<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("btech_final_2016_17", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select username, password from admin_user where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
	mysql_close($connection); // Closing Connection
$_SESSION['login_user']=$username; // Initializing Session

$cookie_name = "pro_user";
$cookie_value = $username;
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day

$cookie_name = "pro_pass";
$cookie_value = "plm";
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day

} else {
	mysql_close($connection); // Closing Connection
$error = "Username or Password is invalid";
}

}
}
?>