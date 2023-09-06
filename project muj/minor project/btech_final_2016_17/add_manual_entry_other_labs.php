<?php

require_once('/includes/session.php');


require_once ('/includes/functions.php');

$error=''; // Variable To Store Error Message
switch ($login_session) {
    case 'cl3':
        $labno='CL3';
        break;
    case 'cl4':
        $labno='CL4';
        break;
    case 'cl5':
        $labno='CL5';
        break;
    case 'cl6':
        $labno='CL6';
        break;
    case 'cl7':
        $labno='CL7';
        break;
    case 'cl8':
        $labno='CL8';
        break;
    case 'cl9':
        $labno='CL9';
        break;
    default:
        $labno='CL9';
} 

//$labno='CL9';



if (isset($_POST['submit'])) 
{
	$enrollment=$_POST['enroll'];
	$enroll_exists=enrollment_no_exists($enrollment);
	
	if ($enroll_exists>0)
	{
		$hrs=$_POST['hrs'];
		$mins=$_POST['mins'];
		$time_spent=convert_hrs_mins_to_secs($hrs,$mins);
		echo $strSQL = "insert into attendance_other_labs(enroll_no, attendance) VALUES ($enrollment, $time_spent);";

		$rs = mysql_query($strSQL);
		$error = "The record has been entered successfully";		

			mysql_close($connection);// Closing Connection

	
	}
	else 
	{
		$error = "Please enter the valid enrollment number";
		mysql_close($connection);// Closing Connection
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
 <script src="datetimepicker_css.js"></script>

<!--<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="my_script.js"></script>-->
 <link rel="stylesheet" type="text/css" href="style1.css" />
 

<SCRIPT language=JavaScript>
var message = "function disabled";
function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
document.onmousedown = rtclickcheck;
</SCRIPT>
<SCRIPT language=JavaScript>
function my_onkeydown_handler() {
    switch (event.keyCode) {
        case 116 : // 'F5'
            event.preventDefault();
            event.keyCode = 0;
            window.status = "F5 disabled";
            break;
		case 82 : //R button
			if (event.ctrlKey){ 
				event.returnValue = false;
				event.keyCode = 0;
				return false;
			}
    }
}
document.addEventListener("keydown", my_onkeydown_handler);
 </SCRIPT>

</head>
 <body>
  <?php
include('/includes/header.php');
?>


  <div id="mhead"><h2>Add Attendance for Other Labs</h2></div>

<form id="forms" action="" method="post">
<table id='formtable'  cellspacing="0">

<tr>
<td><label>Enter the Enrollment Number:</label></td>
<td><input id="enroll" name="enroll"  type="text"></td>
</tr>
<tr>
<td><label>Hours:</label></td>
<td><input id="hrs" name="hrs"  type="text"></td>
</tr>
<tr>
<td><label>Minutes:</label></td>
<td><input id="mins" name="mins"  type="text"></td>
</tr>

<tr>
<td></td>
<td><input name="submit" type="submit" value=" Enter "></td>
</tr>
<tr>
<td colspan='2' align="right"></td>
</tr>
<tr>
<td colspan='2'><span class="err"><?php echo $error; ?></span></td>
</tr>


</table>
</form>







 </body>
</html>
