<?php

require_once('/includes/session.php');
require_once ('/includes/functions.php');
$error=''; // Variable To Store Error Message
$emailf="";
$message="";
$subject_mail="";

if (isset($_POST['submit'])) 
{
	
	//$grp=$_POST['grp'];
	echo $stu_supervisor=$_POST['superviser'];
	if ($stu_supervisor=="HOD")
	{
		$emailf=get_facultyemail("SPG");
		$grp_by_supervisor_data=get_group_data();
		$subject_mail="All BTech Final Year Project Students Attendance till 8th March 2016";
		$message=$emailf."<br /><br />";
		$message .=$subject_mail."<br /><br />";
$message .="Dear Sir,<br /><br /> The attendance of all the
Btech Final Year Project Students is as under:<br /><br />";
	}
	else
	{
		$emailf=get_facultyemail($stu_supervisor);
		$grp_by_supervisor_data=get_group_data_by_supervisercode($stu_supervisor);
		$subject_mail="BTech Final Year Project Students Attendance till 8th  March 2016";
				$message=$emailf."<br /><br />";
						$message .=$subject_mail."<br /><br />";

$message .="Dear Sir / Madam,<br /><br /> The attendance of the
Btech Final Year Project Students being supervised by you  <br />
is as under:<br /><br />";
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


function set_supervisor(abc)
{
	alert(abc);
	document.getElementById(superviser).value = abc;
}

</SCRIPT>
 <link rel="stylesheet" type="text/css" href="style1.css" />

 </head>
 <body><?php
include('/includes/header.php');

?>
  <div id="mhead">   <h2>Faculty-Wise Group Data</h2></div>
<form action="" method="post">
<table id='formtable'  cellspacing="0">

<?php
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db($db_name, $connection);
	$student_details=get_stud_data();
	$faculty_details=get_facultydata();
	$project_details=get_project_data();
?>


<tr>
<td>
	
   <label>Project Supervisor:</label></td>;

<?php 
    echo '<td><select name="superviser">';
    echo '<option value="HOD">Select any one</option>';

		for ($i=0;$i<sizeof($faculty_details);$i++) {
        $name =  $faculty_details[$i]['fname'].$faculty_details[$i]['lname'];
		$facultycode = $faculty_details[$i]['faculty_code'];
		$facultyemail = $faculty_details[$i]['email'];
 ?>
		<option value="<?php echo $facultycode;?>"><?php echo $name;?></option>
		<?php    } 
    echo '</select>';
    echo '</label>';

?>
</td>
</tr>
<tr>
<td colspan="2"><input name="submit" type="submit" value=" Enter "></td>
</tr>
<tr>
<td colspan="2"><span><?php echo $error; ?></span></td>
</tr>
</table>
</form>

<div id="divToPrint">
<?php
if (isset($_POST['submit']))
{
	$aaa=sizeof($grp_by_supervisor_data);
	if ($aaa != 0) 
	{
		
		 $message .="<table border='0' cellspacing=1 style='border-color:lightseagreen;'>";
	
		$message .="<b>TOTAL HOURS : 52</b><br />";
		$message .="<b>ATTENDANCE UP TO 8th March 2016</b><br /><br />";
			 
		
		for ($i=0; $i<$aaa; $i++)
		{
			
			
			
			$group=$grp_by_supervisor_data[$i]['old_group_no'];
			 $grp=$grp_by_supervisor_data[$i]['group_no'];
			
			$message .="<tr style='background-color:#FFFFF0;'><td><b>Group ".$group."</b></td>";
			 $message .="<td colspan='2'><b>Project Title - ". get_project_title_by_proj_id($grp_by_supervisor_data[$i]['project'])."</b></td></tr>";
			 $group_student_data=get_group_student_data($grp);
					$bbb=sizeof($group_student_data);
					 if ($bbb != 0) {
						for ($j=0;$j<$bbb;$j++) 
						{
							$enroll_mem1 = $group_student_data[$j]['enroll_no'];
							$name_mem1 = $group_student_data[$j]['fname']. " " . $group_student_data[$j]['lname'];
							$attendance_details=get_attendance_by_enroll($enroll_mem1);
							$view_att=$attendance_details[0]['attendance'];
		
							$hour_min=convert_sec_to_hour_min($view_att);
							$total_hours=52;
							$att_enddate=$attendance_details[0]['Uptodate'];

					
					
					
					$message .="<tr><td>".$enroll_mem1."</td><td>".$name_mem1."</td><td>Hours worked :";
					
		if ($hour_min['hours']>=$total_hours)
		{
		   $message .=$total_hours." hours";
		}
		else if ($hour_min['hours']<$total_hours)
		{
			if ($hour_min['hours']>0)
			{
				$message .= $hour_min['hours']." hours ";
			}
			if ($hour_min['minutes']>0)
			{
				$message .=$hour_min['minutes']." minutes ";
			}
		}
		
		
		$message .="</td><td>Marks :";
		if ($hour_min['hours']>$total_hours)
		{
			$hour_min['hours']=$total_hours;
			
		}
$marks=ceil(($hour_min['hours']/52)*10);
$message .=$marks;

$message .="</td></tr>";
		
						}
					}
					?>


			
			
			<?php
		}
			?>
		
		<?php

	}
	else 
	{
		$message .= "No Groups Being Supervised";
	}
}
$message .="</table><br />

 Thank you,<br />
 Admin (Attendance Software),<br />
 Project Lab";

echo $message;
$to = 'anshulsood27@gmail.com';
$subject = "Btech Final Year Project Lab Attendance";
;
$headers = 'From: anshul.sood@juit.ac.in' . "\r\n" .
$headers = "MIME-Version: 1.0" . "\r\n" .
$headers = "Content-type:text/html;charset=iso-8859-1" . "\r\n" .
            'Reply-To: anshul.sood@juit.ac.in' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

  

//$mail = $smtp->send($to, $headers, $message);
?>
</div> <!--end of divToPrint -->
  <input type="button" name="send" value="SEND" onclick="sendmail()" />
 </body>
</html>
