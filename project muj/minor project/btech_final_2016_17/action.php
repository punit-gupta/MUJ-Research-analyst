<?php

require_once('/includes/session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<SCRIPT language=JavaScript>
var message = "function disabled";
function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
document.onmousedown = rtclickcheck;
</SCRIPT></head>
<body>
<?php
include('/includes/header.php');
?>

<div id="main">
		<table id="demotable">
		
		
	<?php
		if($_SESSION['login_user']=="admin")
		{
			?>
		<tr><td>FACULTY :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="faculty.php">View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr><tr>
		<td>STUDENTS :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="view_student.php">View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="add_student.php">Add New</a></td>
		</tr>
		<tr>
		<td>GROUPS :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="groups.php">View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="add_student_group_data.php">Add New</a></td>
		</tr>
		<tr>
		<td><a href="add_group_data.php">Add Projects</a></td>
		</tr>
<tr><td><a href="add_bdate_entry.php">Add Manual Student Entry</a></td>
		</tr>
<tr><td>ATTENDANCE : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="faculty_wise_list.php">View Faculty Wise List </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="view_attendance1.php">Student Attendance</a></td>
		</tr>
		<?php
		}
			?>
		<tr><td><a href="add_entry.php">Add Student Entry</a></td>		</tr>

		<!--<tr><td><a href="add_entry_adm.php">Add Student Entry</a></td>
		</tr>-->
		
		<tr><td><a href="get_att.php">View Student Entry Details</a></td>
		</tr>

		<!--<tr><td><a href="add_manual_entry_other_labs.php">Add Manual Student Entry - Other labs</a></td>
		</tr>-->
		<tr>
		<td><a href="ch_pwd.php">Change Student Password</a></td>
		</tr>
		<?php
		if($_SESSION['login_user']=="admin")
		{
			?>	
		<!--<tr>
		<td><a href="view_attendance.php">View Student Attendance</a></td>
		</tr>-->
		

		<tr>
		
		
		<!--req<td><a href="add_cgpa.php">Enter CGPA</a></td>
		</tr><tr>
		<td><a href="add_midmarks.php">Enter Mid Term Presentation Marks</a></td>
		</tr><tr>-->


		<!--<td><a href="view_student_marks.php">View Mid Term Presentation Marks</a></td>
		</tr><tr>-->
		<!--<td><a href="view_student_finaltermmarks.php">View Final Term Presentation Marks</a></td>
		</tr><tr>-->


		<!--req<td><a href="add_finalterm_marks.php">Enter Final Term Presentation Marks</a></td>
		</tr><tr>
		
		<td><a href="view_final_marks.php">View Final Result</a></td>		</tr>-->
			<?php
				mysql_close($connection); // Closing Connection

		}
			?>	
		</table>
		</div>
</body>
</html>
