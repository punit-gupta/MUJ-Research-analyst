<?php
require_once('/includes/session.php');

include('/includes/functions.php');

$error=''; // Variable To Store Error Message



if (isset($_POST['submit'])) 
{
	if (empty($_POST['enroll']))
	{
		$error = "Please enter the enrollment number";
	}
	
	
	if (empty($_POST['old_pass'])) 
	{
		$error = "Please enter the Old Password";
	}
	
	if (empty($_POST['new_pass'])) 
	{
		$error = "Please enter the New Password";
	}
	
	$enrollment=$_POST['enroll'];
	$old_pass=$_POST['old_pass'];
	$new_pass=$_POST['new_pass'];

	$enroll_exists=enrollment_no_exists($enrollment);

	
	if ($enroll_exists>0)
	{
		$orig_oldpass=get_student_password($enrollment);
		if ($old_pass == $orig_oldpass)
		{
			
			if ($old_pass == $new_pass)
			{
				$error = "New Password must be different from the Old Password";
			}
			else
			{
				$qry="UPDATE student SET password='".$new_pass."' WHERE enroll_no=".$enrollment.";";
				mysql_query($qry);
				$error="Password changed successfully";
			}
		}
		else 
		{
			$error="Password entered doesnot match the old password";
		}
	}
	else 
	{
		$error = "Please enter the valid enrollment number";
	}
	

 
}
	
if (isset($_POST['submit1'])) 
{
	if (empty($_POST['enroll']))
	{
		$error = "Please enter the enrollment number";
	}
	
	
	
	$enrollment=$_POST['enroll'];

	$enroll_exists=enrollment_no_exists($enrollment);

	
	if ($enroll_exists>0)
	{
		
		$qry="UPDATE student SET password='' WHERE enroll_no=".$enrollment.";";
		mysql_query($qry);
		$error="Password has been reset";
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
<?php 
if (($login_session=='admin')||($login_session=='adm'))
{
	?>
<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enrollment Number:</label></td>
<td><input id="enroll" name="enroll"  type="text" value="">
</td>
</tr>
<tr>
<td><label>Old Password:</label></td>
<td><input id="old_pass" name="old_pass"  type="password" value="">
</td>
</tr>
<tr>
<td><label>New Password:</label></td>
<td><input id="new_pass" name="new_pass"  type="password" value="">
</td>
</tr>
<tr>
<td colspan="2"><input name="submit" type="submit" value=" Change Password "><input name="submit1" type="submit" value=" Reset Password ">
</td>
</tr>



</table>
<?php
}
else
{
	$error="You are not authorised to view this page";
}
mysql_close($connection); // Closing Connection
?>
<span class="err"><?php echo $error; ?></span>
</form>




 </body>
</html>
