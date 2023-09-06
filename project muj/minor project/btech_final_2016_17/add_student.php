<?php
require_once('/includes/session.php');
require_once ('/includes/functions.php');
$error=''; // Variable To Store Error Message



if (isset($_POST['submit'])) 
{
	if (empty($_POST['enroll'])) 
	{
		$error = "Please enter the enrollment number";
	}
	else
	{
		$enrollment=$_POST['enroll'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$batch=$_POST['batch'];
		
		$query = "INSERT INTO student (enroll_no, fname, lname, batch)
VALUES ($enrollment, '$fname', '$lname', '$batch');";
		mysql_query($query) or die("SELECT Error: ".mysql_error());
		//$error="The new record has been entered";
							$page = $_SERVER['PHP_SELF'];
					$sec = "4";
					header("Refresh: $sec; url=$page");
	
	 

		
	
	}
	
}
?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <SCRIPT language=JavaScript>
var message = "function disabled";
function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
document.onmousedown = rtclickcheck;
</SCRIPT>
 <link rel="stylesheet" type="text/css" href="style1.css" />

 </head>
 <body><?php
include('/includes/header.php');
?>
  <div id="mhead">   <h2>Add Student</h2></div>
<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enter the Enrollment Number:</label></td>
<td><input id="enroll" name="enroll" placeholder="enroll" type="text"></td>
</tr>
<tr>
<td><label>Enter the First Name:</label></td>
<td><input id="fname" name="fname" placeholder="fname" type="text"></td>
</tr>
<tr>
<td><label>Enter the Last Name:</label></td>
<td><input id="lname" name="lname" placeholder="lname" type="text"></td>
</tr><tr>
<td><label>Enter the Batch:</label></td>
<td><input id="batch" name="batch" placeholder="batch" type="text"></td>
</tr>
<tr>
<td colspan="2"><input name="submit" type="submit" value=" Enter "></td>
</tr>
<tr>
<td colspan="2"><span><?php echo $error; ?></span></td>
</tr>
</table>
</form>
 </body>
</html>
