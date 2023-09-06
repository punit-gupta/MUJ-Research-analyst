<?php
require_once('/includes/session.php');
require_once ('/includes/db_config.php');
include('/includes/functions.php');

$error=''; // Variable To Store Error Message



if (isset($_POST['submit'])) 
{
	if (empty($_POST['enroll']))
	{
		$error = "Please enter the enrollment number";
	}
	
	
	if (empty($_POST['email'])) 
	{
		$error = "Please enter the valid Email Address";
	}
	
	if (empty($_POST['mobile'])) 
	{
		$error = "Please enter the valid Mobile Number";
	}
	
	

	$enrollment=$_POST['enroll'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$new_pass=$_POST['new_pass'];

	$enroll_exists=enrollment_no_exists($enrollment);

	
	if ($enroll_exists>0)
	{
		echo $first_time_user=check_if_first_time_user($enrollment);
		if ($first_time_user==0)
		{

			$qry="UPDATE student SET email='".$email."', mobile='".$mobile."', password='".$new_pass."', first_time_user=1 WHERE enroll_no=".$enrollment.";";
			mysql_query($qry);
			$error="Password changed successfully";
		}
		else
		{
			$error="Please contact the admin.";
		}
	}
	else 
	{
		$error = "Please enter the valid enrollment number";
	}
	

 
}
	

?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus�">
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
 <body>
 <?php
include('/includes/header.php');
?>
  <div id="mhead"><h2>Change Password</h2></div>

<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enrollment Number:</label></td>
<td><input id="enroll" name="enroll"  type="text" value="">
</td>
</tr>
<tr>
<td><label>Email Address:</label></td>
<td><input id="email" name="email"  type="text" value="">
</td>
</tr>
<tr>
<td><label>Mobile:</label></td>
<td><input id="mobile" name="mobile"  type="text" value="">
</td>
</tr>
<tr>
<td><label>New Password:</label></td>
<td><input id="new_pass" name="new_pass"  type="password" value=""  maxlength="8">( Password must not be more than 8 digit long )
</td>
</tr>
<tr>
<td colspan='2'></td>
</tr>
<tr>
<td colspan='2'><span class="notice">
Kindly do not share this password with any one.
</span></td>
</tr>
<tr>
<td colspan="2"><input name="submit" type="submit" value=" Change Password ">
</td>
</tr>
<tr>
<td colspan="2"><a href="add_entry.php">Add Entry</a>
</td>
</tr>


</table>

<span class="err"><?php echo $error; ?></span>
</form>




 </body>
</html>
