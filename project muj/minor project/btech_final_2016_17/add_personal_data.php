<?php
require_once('/includes/session.php');
require_once ('/includes/db_config.php');
include('/includes/functions.php');

$error=''; // Variable To Store Error Message


if (isset($_GET['enroll']))
{
	$rec=$_GET['enroll'];
	$rec_data=get_student_details($rec);
	$rec_name=$rec_data['fname']." ".$rec_data['lname'];
	$rec_email=$rec_data['email'];
	$rec_mob=$rec_data['mobile'];
}
else
{
	$rec="";
	//$rec_data=get_student_details($rec);
	$rec_name="";
	$rec_email="";
	$rec_mob="";
}

if (isset($_POST['submit'])) 
{
	if (empty($_POST['enroll']))
	{
		$error = "Please enter the enrollment number";
	}
	
	
	if (empty($_POST['sname'])) 
	{
		$error = "Please enter the Name";
	}
	
	$enrollment=$_POST['enroll'];
	$sname=$_POST['fname'];
	$email=$_POST['email'];
	$mob=$_POST['mob'];
	
	$enroll_exists=enrollment_no_exists($enrollment);

	
	if ($enroll_exists>0)
	{
		$qry="UPDATE student SET email='".$email."', mobile='".$mob."' WHERE enroll_no=".$enrollment.";";
		mysql_query($qry);
	}
	else 
	{
		$error = "Please enter the valid enrollment number";
	}
	$page = $_SERVER['PHP_SELF'];
	$sec = "0";
	header("Refresh: $sec; url=$page");

 
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

<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="myscript5.js"></script>

 <link rel="stylesheet" type="text/css" href="style1.css" />
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
  <div id="mhead"><h2>Add Personal Data</h2></div>
<?php 
if ($login_session=='admin')
{
	?>

<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enrollment Number:</label></td>
<td><input id="enroll" name="enroll"  type="text" value="<?php echo $rec;?>">
</td></tr><tr>
<td><label>Name:</label></td>





<td><input id="sname" name="sname"  type="text" value="<?php echo $rec_name;?>">
</td>
</tr><tr>
<td><label>Email:</label></td>





<td><input id="email" name="email"  type="text" value="<?php echo $rec_email;?>">
</td></tr><tr>
<td><label>Mobile</label></td>





<td><input id="mob" name="mob"  type="text" value="<?php echo $rec_mob;?>">
</td>
<td><input name="submit" type="submit" value=" Enter ">
</td>
</tr>



</table>



</form>


<div id="auto">
</div> <!--   end of auto -->

<?php
}
else
{
	$error="You are not authorised to view this page";
}

?>
<span class="err"><?php echo $error; ?></span>


 </body>
</html>
