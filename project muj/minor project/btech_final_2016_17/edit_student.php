<?php
require_once('/includes/session.php');
require_once ('/includes/functions.php');
$error=''; // Variable To Store Error Message


if (isset($_GET['enroll'])) 
{
	$enrol=$_GET['enroll'];
	$student_data=get_student_details($enrol);
	$grp=$student_data['group_no'];
	$ftname=$student_data['fname'];
	$ltname=$student_data['lname'];
	$batch_no=$student_data['batch'];
}

if (isset($_POST['submit'])) 
{

		$group=$_POST['grp'];
		$f_name=$_POST['fname'];
		$l_name=$_POST['lname'];
		$batch=$_POST['batch'];
		
		//$query = "INSERT INTO student (enroll_no, fname, lname, batch)VALUES ($enrollment, '$fname', '$lname', '$batch');";
		//mysql_query($query) or die("SELECT Error: ".mysql_error());
		echo $query = "UPDATE student SET group_no=".$group.", fname='".$f_name."', lname='".$l_name."', batch='".$batch."' WHERE enroll_no=".$enrol.";";
		mysql_query($query) or die("SELECT Error: ".mysql_error());
		
	$error="The Student Information has been changed";
	header('Location: groups.php');
	
	 

		
	

	
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
  <div id="mhead">   <h2>Edit Student Details</h2></div>
<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enrollment Number:</label></td>
<td><label><?php echo $enrol; ?></label></td>
</tr>
<tr>
<td><label>Group Number:</label></td>
<td><input id="grp" name="grp" value="<?php echo $grp; ?>" type="text"></td>
</tr>
<tr>
<td><label>Enter the First Name:</label></td>
<td><input id="fname" name="fname" value="<?php echo $ftname; ?>" type="text"></td>
</tr>
<tr>
<td><label>Enter the Last Name:</label></td>
<td><input id="lname" name="lname" value="<?php echo $ltname; ?>" type="text"></td>
</tr><tr>
<td><label>Enter the Batch:</label></td>
<td><input id="batch" name="batch" value="<?php echo $batch_no; ?>" type="text"></td>
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
