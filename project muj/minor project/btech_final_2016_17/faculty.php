<?php
require_once('/includes/session.php');
$error='';
?>
<!DOCTYPE HTML>
<html>
<title>Faculty</title>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<SCRIPT language=JavaScript>
var message = "function disabled";
function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
document.onmousedown = rtclickcheck;
</SCRIPT>
</head>
<body>
 <?php
include('/includes/header.php');
?>

<div id="mhead"><h2>Manage Faculty Data</h2></div>
<?php 
if ($login_session=='admin')
{
	?>

<table id='demoajax' cellspacing="0">
</table>
<script type="text/javascript" src="script.js"></script>
<div><a href="view_faculty.php">Print Faculty Data</a></div>
<?php
}
else
{
	$error="You are not authorised to view this page";
}
mysql_close($connection); // Closing Connection
?>
<span class="err"><?php echo $error; ?></span>

</body>
</html>
