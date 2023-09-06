<?php
		if(isset($_COOKIE['pro_user']) && isset($_COOKIE['pro_pass']))
		{
			header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
			setcookie("pro_user", "", time() - 60, "/");
			setcookie("pro_pass", "", time() - 60, "/");
		}
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>