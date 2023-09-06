<?php
require_once('/includes/session.php');

include('/includes/functions.php');

$error=''; // Variable To Store Error Message


if (isset($_GET['enroll']))
{
	$rec=$_GET['enroll'];
	$rec_cgpa=get_cgpa($rec);
}
else
{
	$rec="";
	$rec_cgpa="";
}

if (isset($_POST['submit'])) 
{
	if (empty($_POST['enroll']))
	{
		$error = "Please enter the enrollment number";
	}
	
	
	if (empty($_POST['cgpa'])) 
	{
		$error = "Please enter the CGPA";
	}
	
	$enrollment=$_POST['enroll'];
	$cgpa=$_POST['cgpa'];
	
	$enroll_exists=enrollment_no_exists($enrollment);

	
	if ($enroll_exists>0)
	{
		$qry="UPDATE student SET CGPA=".$cgpa." WHERE enroll_no=".$enrollment.";";
		mysql_query($qry);
	}
	else 
	{
		$error = "Please enter the valid enrollment number";
	}
	mysql_close($connection); // Closing Connection
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
<script type="text/javascript" src="myscript1.js"></script>
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
  <div id="mhead"><h2>Add CGPA</h2></div>
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
<td><label>CGPA:</label></td>





<td><input id="cgpa" name="cgpa"  type="text" value="<?php echo $rec_cgpa;?>">
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
