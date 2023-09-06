<?php
require_once('/includes/session.php');

require_once ('/includes/functions.php');
$today_date=date("Y-m-d");
$error='';
$total_hours=52;


	

	$att_data=get_attendance_displayed_details();



?>
<!DOCTYPE html>
<html>
<head>
 <script src="datetimepicker_css.js"></script>
 <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
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
<div id="mhead"><h2>View Attendance and Marks</h2></div>
<?php 
if ($login_session=='admin')
{
	?>


<div id="divToPrint">
<?php

		$aaa=sizeof($att_data);
if ($aaa != 0) {
	?>

 <div id="heading"><h2>Attendance Marks</h2></div>
<p><b>
Total Hours - <?php echo $total_hours;?></b>

</p>

<table id='demotable'  cellspacing="0" border="1">
<tr class="head">

<td>Enroll No.</td>
<td>Name</td>
<td>Attendance</td>
<td>Attendance Marks</td>
</tr>

    
<?php
    for ($i=0; $i<$aaa; $i++)
	{
		$view_enroll= $att_data[$i]['enroll_no'];
        $view_name = get_student_name_by_id($view_enroll);

$attendance_details=get_attendance_by_enroll($view_enroll);
							$view_att=$attendance_details[0]['attendance'];
$hour_min=convert_sec_to_hour_min($view_att);

		
		?>

       <tr><td> <?php echo $view_enroll; ?></td><td><?php echo $view_name; ?></td>
	    <td>
		<?php
		if ($hour_min['hours']>=$total_hours)
		{
		   echo $total_hours." hours";
		}
		else if ($hour_min['hours']<$total_hours)
		{
			if ($hour_min['hours']>0)
			{
				echo $hour_min['hours']." hours ";
			}
			if ($hour_min['minutes']>0)
			{
				echo $hour_min['minutes']." minutes ";
			}
		}
		
		?>
		</td>
	   	  <td>
		<?php
		if ($hour_min['hours']>$total_hours)
		{
			$hour_min['hours']=$total_hours;
			
		}
		
		echo $marks=ceil(($hour_min['hours']/52)*10);
		?>
		</td>
	   
	   </tr>
<?php
  
}
mysql_close($connection); // Closing Connection

?>
</table>
</div>
<div id="printbutton">
  <input type="button" value="Print" onclick="PrintDiv();" />
</div>
<?php 
}
?>
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