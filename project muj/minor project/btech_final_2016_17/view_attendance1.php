<?php
require_once('/includes/session.php');

require_once ('/includes/functions.php');
$today_date=date("Y-m-d");
$error='';
$total_hours=72; //change at one place
$endDate='';

if (isset($_POST['save'])) 
{
	$qrry="truncate attendance_displayed;";
	mysql_query($qrry); 
	$endDate=$_POST["att_date"];
	$total_hours=$_POST["tot_hrs"];
	$qry="INSERT INTO attendance_displayed (enroll_no, attendance) SELECT enroll_no, attendance FROM attendance";
	mysql_query($qry); 
	$qry1="update attendance_displayed set Uptodate='".$endDate."', total_hours=".$total_hours.";";
	mysql_query($qry1); 

}

if (isset($_POST['submit'])) 
{
	$date1=$_POST["demo1"];
	$startDate = date("Y-m-d", strtotime($date1));
	$date2=$_POST["demo2"];
	$endDate = date("Y-m-d", strtotime($date2));
	get_attendance($startDate,$endDate);
	$att_data=get_attendance_details();
	//$a=1;

}



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
<div id="mhead"><h2>View Attendance</h2></div>
<?php 
if ($login_session=='admin')
{
	?>

<form name="tstest" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label for="demo1">Please enter a date here &gt;&gt; </label></td>
<td><input type="Text" id="demo1" maxlength="25" size="25" name="demo1" />
     <img src="images/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer"/></td>
	 </tr>
	 <tr>
	 <td><label for="demo1">Please enter a date here &gt;&gt; </label></td>
	 <td><input type="Text" id="demo2" maxlength="25" size="25" name="demo2" />
     <img src="images/cal.gif" onclick="javascript:NewCssCal('demo2')" style="cursor:pointer"/></td>
</tr>
<tr>
<td colspan='2'><input name="submit" type="submit" value="Submit" /></td>
</tr>
</table>
</form>
<div id="divToPrint">
<?php
if (isset($_POST['submit']))
	{
		$aaa=sizeof($att_data);
if ($aaa != 0) {
	?>
<form name="f1" method="post">
 <div id="heading"><h2>Attendance <?php echo $startDate; if ($endDate<>"1970-01-01")
	{ echo " to ". $endDate; }?></h2></div>
<p><b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Hours - <?php echo $total_hours;?></b>

</p>

<table id='demotable'  cellspacing="0" border="1">
<tr class="head">

<td>Enroll No.</td>
<td>Name</td>
<td>Attendance</td>
</tr>

    
<?php
    for ($i=0; $i<$aaa; $i++)
	{
		$view_enroll= $att_data[$i]['enroll_no'];
        $view_name = get_student_name_by_id($view_enroll);
		$view_attendance=$att_data[$i]['attendance'];
		//$hours=$view_attendance/3600;
		//$min=($view_attendance%3600)/60;
		$hour_min=convert_sec_to_hour_min($view_attendance);
		//echo $hour_min['hours']. ":" .$hour_min['minutes'];

		
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
	   
	   </tr>
<?php
    }
}
mysql_close($connection); // Closing Connection

?>
</table>
<input type="hidden" name="tot_hrs" value="<?php echo $total_hours; ?>">
<input type="hidden" name="att_date" value="<?php echo $endDate; ?>">
</div>
<div id="printbutton">
  <input type="button" value="PRINT" onclick="PrintDiv();" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="save" value="SAVE" onclick="save_attendance()" />
</div>
</form>
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