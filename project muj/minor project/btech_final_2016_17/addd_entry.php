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
$today_date=date("Y-m-d");

$client_ip_addr=get_client_ip();



if (isset($_POST['submit'])) 
{
	if (empty($_POST['enroll']))
	{
		$error = "Please enter the enrollment number";
	}
	
	
	if (empty($_POST['password'])) 
	{
		$error = "Please enter the valid password";
	}
	else
	{
		$client_ip_addr=get_client_ip();
		$enrollment=$_POST['enroll'];
		$enroll_exists=enrollment_no_exists($enrollment);
		
		if ($enroll_exists>0)
		{
			$entered_password=$_POST['password'];
			$password=get_student_password($enrollment);
			
			if($entered_password == $password)
			{
			
				$already_in=check_if_already_there($enrollment);
				if ($already_in==1)
				{
					$student_entry_details=get_in_entry_details_stud($enrollment);
					$entryid=$student_entry_details['sr_no'];
					$in_time=$student_entry_details['in_time'];
					$login_ter=$student_entry_details['login_terminal'];
					$date_time=get_curdate_time();
					$time_spent=get_timediff_in_sec($in_time,$date_time);
					$view_duration=get_time_duration($in_time);
					

					$qry2="insert into full_entry_details(enroll_no, indate, in_time, out_time, duration, login_terminal, logout_terminal, lab) VALUES ($enrollment, '$today_date', '$in_time', '$date_time', $time_spent, '$login_ter', '$client_ip_addr','$labno');";
					mysql_query($qry2);
					$qry1="delete from entry_list WHERE enroll_no=".$enrollment.";";
					mysql_query($qry1);					
					$qry="delete from entry_details WHERE sr_no=".$entryid.";";
					mysql_query($qry);
					$error ="You have worked for ".$view_duration['hours']." hours"." ".$view_duration['minutes']." minutes";
					unset($_POST);
				
					mysql_close($connection);// Closing Connection

					$page = $_SERVER['PHP_SELF'];
					$sec = "10";
					header("Refresh: $sec; url=$page");

				}
				else
				{
					$disapproved_status=get_prev_entry_status($enrollment);
					if ($disapproved_status==1)
					{
						$error="Your previous entry has been disapproved by the admin";
						$qry1="UPDATE student SET prev_entry_status=0 WHERE enroll_no=".$enrollment.";";
						mysql_query($qry1);
						
						mysql_close($connection);// Closing Connection

					}
					else
					{
						$dt1=get_curdate_time();

						$strSQL = "insert into entry_details (enroll_no, indate, in_time, login_terminal, lab) VALUES ($enrollment, '$today_date', '$dt1',  '$client_ip_addr','$labno');";
	
						$rs = mysql_query($strSQL);
						$strSQL1 = "insert into entry_list (enroll_no) VALUES ($enrollment);";
	
						$rs1 = mysql_query($strSQL1);
unset($_POST);
						mysql_close($connection);// Closing Connection

					}
				}
			}
			else
			{	
				$error = "Please enter the correct password";
			
				mysql_close($connection);// Closing Connection

			}

		}
		else 
		{
			$error = "Please enter the valid enrollment number";
				mysql_close($connection);// Closing Connection
		}
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

<!--<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="my_script.js"></script>-->
 <link rel="stylesheet" type="text/css" href="style1.css" />
 <script language="javascript" src="liveclock.js"></script>
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
 <body onLoad="show_clock()">
  <?php
include('/includes/header.php');
?>


  <div id="mhead"><h2>Add Entry</h2></div>

<form id="forms" action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enter the Enrollment Number:</label></td>
<td><input id="enroll" name="enroll"  type="text"></td>
</tr>
<tr>
<td><label>Enter the Password :</label></td>
<td><input id="password" name="password" type="password">&nbsp;<input name="submit" type="submit" value=" Enter "> <a href="ch_pwd_newuser.php"
>New User</a></td>
</tr>
<tr>
<td colspan='2' align="right"></td>
</tr>
<tr>
<td colspan='2'><span class="notice">
The student's entry can be disapproved by the Admin if found misbehaving or missing from the lab
</span></td>
</tr>
<tr>
<td colspan='2'><span class="err"><?php echo $error; ?></span></td>
</tr>


</table>
</form>
<!--<span class="err" style="color:lightseagreen;">Current Date & Time : <?php $date_time=get_curdate_time(); $date_time1 = date("d-M-Y", strtotime($date_time)); $date_time2 = date("h:i a", strtotime($date_time)); echo $date_time1." ".$date_time2; ?></span>-->

<!--<div id="auto">
</div>   end of auto -->

<table  id='demotable'  cellspacing="0">
<tr class="head">
<td>Sr.No</td>
<td>Enroll No.</td>
<td>Name</td>
<td>Intime</td>
<!--<td>Duration</td>-->

</tr>
<?php
$today_date=date("Y-m-d");
	$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("btech_final_2016_17", $connection);
	
		$current_in_entries=get_in_entry_detail($today_date);
		$aaa=sizeof($current_in_entries);
if ($aaa != 0) {
    

    for ($i=0; $i<$aaa; $i++)
	{
		$j=$i+1;
		$entry_no= $current_in_entries[$i]['sr_no'];
		$view_enroll= $current_in_entries[$i]['enroll_no'];
        $view_name = get_student_name_by_id($view_enroll);
		$view_intime = $current_in_entries[$i]['in_time'];
		$view_duration=get_time_duration($view_intime);
		$t= date("h:i:s a",strtotime($view_intime));
		?>
		<form action="" method="post">
		<?php
        echo "<tr><td>".$j."</td><td>".$view_enroll."</td><td>".$view_name."</td><td>".$t."</td></tr>";
		?>

		</form>
		<?php
    }

}
else
{
	echo "<tr><td colspan='8'>No Student Logged In Currently</td></tr>";
}


?>
</table>





 </body>
</html>
