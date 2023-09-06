<?php
require_once('/includes/session.php');
require_once ('/includes/functions.php');
$error=''; // Variable To Store Error Message
$view_details=0;

if (isset($_GET['enroll']))
{
	$enrol=$_GET['enroll'];
}


if (isset($_POST['submit'])) 
{
	//$enrol=$_POST['enroll'];
	$entered_password=$_POST['pswd'];
	
	$password=get_student_password($enrol);
			
	if($entered_password == $password)
	{
		$view_details=1;
		//$total_hours=12;
		$student_data=get_student_details($enrol);
		$grp=$student_data['group_no'];
		$ftname=$student_data['fname'];
		$batch_no=$student_data['batch'];
		$group_student_data=get_group_student_data($grp);
		
		$group_data=get_group_data_by_grpid($grp);
		$project=$group_data['project'];
		$suprvsr=$group_data['Supervisor'];
		$old_grp_no=$group_data['old_group_no'];
		$project_title = get_project_title_by_proj_id($project);
		$project_supervisor = get_faculty_name_details($suprvsr);
		$att_data=get_attendance_by_enroll($enrol);
		$view_att=$att_data[0]['attendance'];
		
		$hour_min=convert_sec_to_hour_min($view_att);
		$total_hours=$att_data[0]['total_hours'];
		$att_enddate=$att_data[0]['Uptodate'];
		$error="In case of any change in Project title / Supervisor / Group Members, please contact the Admin";
	}
	else
	{
		print '<script type="text/javascript">'; 
		print 'alert("Wrong Password")'; 
		
		print '</script>';
		//echo "closeCurrentWindow()";
				print '<script type="text/javascript">'; 
print 'window.close()';
	print '</script>';
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
  <SCRIPT language=JavaScript>
var message = "function disabled";
function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
document.onmousedown = rtclickcheck;
</SCRIPT>
    <script type="text/javascript">
    setTimeout("window.close();", 60000);
    </script>
 <link rel="stylesheet" type="text/css" href="style1.css" />

 </head>
 <body onLoad="document.tstest.pswd.focus()"><?php
include('/includes/header.php');
?>

<div id="mhead">   <h2>Student Details</h2></div>
<form name="tstest" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label><b>Enrollment Number</b></label></td>
<td><label><?php echo $enrol; ?></label></td>

<td><label><b>Password</b></label></td>
<td><input type="password" id="pswd" name="pswd" value="" /></td>
	
<td colspan='2'><input name="submit" type="submit" value="Submit" /></td>
</tr>
</table>
</form>

<?php
if ($view_details==1)
	{
?>
  
<form action="" method="post"> 
<table id='formtable'  cellspacing="0" align="center" border="1" style="border-color:lightseagreen;">
<tr>
<td><label><b>Enrollment Number:</b></label></td>
<td><label><?php echo $enrol; ?></label></td>
</tr>
<tr>
<td><label><b>First Name:</b></label></td>
<td><label><?php echo $ftname; ?></label></td>
</tr>

<tr>
<td><label><b>Group No.:</b></label></td>
<td><label><?php echo $old_grp_no; ?></label></td>
</tr>
<tr>
<td><label><b>Group Members :</b></label></td>
<td><label><?php	
		for ($i=0;$i<sizeof($group_student_data);$i++) {
        $en_no =  $group_student_data[$i]['enroll_no'];
		$s_name = $group_student_data[$i]['fname']." ".$group_student_data[$i]['lname'];
		echo $en_no." &nbsp;&nbsp; ".$s_name."<br />";
}

 ?>
			</label></td>
</tr>
<tr>
<td><label><b>Project Title:</b></label></td>
<td><label><?php echo $project_title; ?></label></td>
</tr>
<tr>
<td><label><b>Project Supervisor:</b></label></td>
<td><label><?php echo $project_supervisor['fname']." ".$project_supervisor['lname']; ?></label></td>
</tr>
<tr>
<td><label><b>Batch:</b></label></td>
<td><label><?php echo $batch_no; ?></label></td>
</tr>
<tr>
<td><label><b>Attendance up to &nbsp;&nbsp;<?php echo $att_enddate;?> :</b></label></td>
<td><label><?php
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
		
		
		?> <br />(Total Hours : <?php echo $total_hours;?>)</label></td>
</tr>

<tr style="background-color:#FFFFF0;">
<td colspan="2"><span style="color:darkgreen; font-weight:bold;"><?php echo $error; ?></span>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;<a href="javascript:window.close();">CLOSE </a></td>
</tr>
</table>
</form>
<?php
	}
?>
 </body>
</html>
