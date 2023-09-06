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
$client_ip_addr=get_client_ip();
//$labno='CL9';

if (isset($_GET['demo1'])) 
{
		$date1=$_GET["demo1"];
		$ddate = date("Y-m-d", strtotime($date1));
		$entry_data=get_manual_entry_detail($ddate);
}

if (isset($_POST['submit'])) 
{
	$labno=$_POST['lab'];
	if (isset($_POST['grace']))
		$grace=1;
	else 
		$grace=0;
	$enrollment=$_POST['enroll'];
	$enroll_exists=enrollment_no_exists($enrollment);
	
	if ($enroll_exists>0)
	{
		$hrs=$_POST['hrs'];
		$mins=$_POST['mins'];
		$time_spent=convert_hrs_mins_to_secs($hrs,$mins);
		echo $strSQL = "insert into full_entry_details (enroll_no, indate, duration, lab, grace_entry,login_terminal, logout_terminal) VALUES ($enrollment, '$ddate', $time_spent,'$labno', $grace,'$client_ip_addr','$client_ip_addr');";

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


  <div id="mhead"><h2>Add Entry</h2></div>

<form id="forms" action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label for="demo1">Please enter a date here &gt;&gt; </label></td>
<td><input type="Text" id="demo1" maxlength="25" size="25" name="demo1" value="<?php echo $ddate; ?>" />
    </td>
	 </tr>
<tr>
<td><label>Enter the Lab:</label></td>
<td><select name="lab">

<option value="CL3">CL3</option>
<option value="CL4">CL4</option>
<option value="CL5">CL5</option>
<option value="CL6">CL6</option>
<option value="CL7">CL7</option>
<option value="CL8">CL8</option>
<option value="CL9" selected>CL9</option>
</select></td>
</tr>
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
<td><label>Is it a Grace Entry:</label></td>
<td><input type="checkbox" name="grace" value="1"></td>
</tr>
<tr>
<td></td>
<td><input name="submit" type="submit" value=" Enter ">&nbsp;&nbsp;&nbsp;<a href="add_bdate_entry.php">Change Date</a></td>
</tr>
<tr>
<td colspan='2' align="right"></td>
</tr>
<tr>
<td colspan='2'><span class="err"><?php echo $error; ?></span></td>
</tr>


</table>
</form>


<div id="divToPrint">

<div>
<table  id='demotable'  cellspacing="0">
<tr class="head">
<td>Sr.No.</td>
<td>Enroll No.</td>
<td>Name</td>
<td>Date</td>
<td>Duration</td>
</tr>
<?php
		
		$aaa=sizeof($entry_data);
if ($aaa != 0) 
{
    

    for ($i=0; $i<$aaa; $i++)
	{
		$j=$i+1;
		$entry_no= $entry_data[$i]['sr_no'];
		$view_enroll= $entry_data[$i]['enroll_no'];
        $view_name = get_student_name_by_id($view_enroll);
		$view_indate=$entry_data[$i]['indate'];
		$view_duration = $entry_data[$i]['duration'];
		?>

       <tr><td><?php echo $j; ?></td><td> <?php echo $view_enroll; ?></td><td><?php echo $view_name; ?></td><td><?php echo $view_indate; ?></td><td><?php echo $view_duration; ?></td>

		<?php
	  } ?></tr>
<?php
}
	 


else
{
	echo "<tr><td colspan='5'>No Student Entry</td></tr>";
	
}
mysql_close($connection); // Closing Connection
?>
</table>
</div>
</div> <!-- end of divtoPrint -->
<div id="printbutton">
  <input type="button" value="Print" onclick="PrintDiv();" />
</div>

<span class="err"><?php echo $error; ?></span>



 </body>
</html>
