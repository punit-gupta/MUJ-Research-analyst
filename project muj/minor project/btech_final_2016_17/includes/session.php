<?php
date_default_timezone_set("Asia/Kolkata"); 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("btech_final_2016_17", $connection);
session_start();// Starting Session
// Storing Session
if(isset($_COOKIE['pro_user']) && isset($_COOKIE['pro_pass']))
{
	$user_check=$_COOKIE['pro_user'];
}
else
{
	$user_check=$_SESSION['login_user'];
}
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from admin_user where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
$db_name="btech_final_2016_17";
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>