<?php
require_once('/includes/session.php');
require_once ('/includes/functions.php');
$error=''; // Variable To Store Error Message
$prev_grp=get_max_grp_no();
$new_group=$prev_grp+1;


if (isset($_POST['submit'])) 
{
	
	//$grp=$_POST['grp'];
	$proj_title=$_POST['protitle'];
	$stu_supervisor=$_POST['superviser'];
	$stu_cosupervisor=$_POST['co_superviser'];
	$query = "INSERT INTO groups (group_no, project, Supervisor) VALUES ($new_group, $proj_title, '$stu_supervisor');";
	mysql_query($query) or die("SELECT Error: ".mysql_error());

	if ($_POST['mem1'])
	{
		$mem1=$_POST['mem1'];
		$query = "UPDATE student SET group_no=".$new_group." WHERE enroll_no=".$mem1.";";
		mysql_query($query);
	}

	if ($_POST['mem2'])
	{	
		$mem2=$_POST['mem2'];
		$query = "UPDATE student SET group_no=".$new_group." WHERE enroll_no=".$mem2.";";
		mysql_query($query);		
	}

	if ($_POST['mem3'])
	{
		$mem3=$_POST['mem3'];
		$query = "UPDATE student SET group_no=".$new_group." WHERE enroll_no=".$mem3.";";
		mysql_query($query);	
	}

	$error="New Group has been entered";

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
  <div id="mhead">   <h2>Add Student Group Data</h2></div>
<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enter the Group Number:</label></td>
<td><input id="grp" name="grp" placeholder="<?php echo $new_group; ?>" type="text"></td>
</tr>
<?php
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db($db_name, $connection);
	$student_details=get_stud_data();
	$faculty_details=get_facultydata();
	$project_details=get_project_data();
?>

<tr>
<td><label>Enter Member 1:</label></td>
<td>    <select name="mem1">
   <option value="">Select any one</option>
<?php	
		for ($i=0;$i<sizeof($student_details);$i++) {
        $name =  $student_details[$i]['fname'].$student_details[$i]['lname'];
		$enr = $student_details[$i]['enroll_no'];
 ?>
		<option value="<?php echo $enr;?>"><?php echo $enr." ".$name;?></option>
		<?php    }


 ?> 
 </select>
</td>

</tr>
<tr>
<td><label>Enter Member 2:</label></td>
<td>    <select name="mem2">
   <option value="">Select any one</option>
<?php	
		for ($i=0;$i<sizeof($student_details);$i++) {
        $name =  $student_details[$i]['fname'].$student_details[$i]['lname'];
		$enr = $student_details[$i]['enroll_no'];
 ?>
		<option value="<?php echo $enr;?>"><?php echo $enr." ".$name;?></option>
		<?php    }


 ?> 
 </select>
</td>
</tr>

<tr>
<td><label>Enter Member 3:</label></td>
<td>    <select name="mem3">
   <option value="">Select any one</option>
<?php	
		for ($i=0;$i<sizeof($student_details);$i++) {
        $name =  $student_details[$i]['fname'].$student_details[$i]['lname'];
		$enr = $student_details[$i]['enroll_no'];
 ?>
		<option value="<?php echo $enr;?>"><?php echo $enr." ".$name;?></option>
		<?php    }


 ?> 
 </select>
</td>
</tr>
<tr>
<td><label>Enter the Project Title:</label></td>

<td>    <select name="protitle">
   <option value="">Select any one</option>
<?php	
		for ($i=0;$i<sizeof($project_details);$i++) {
        $ptitle =  $project_details[$i]['project_title'];
		$pcode = $project_details[$i]['sr_no'];
		$psuprvisor=$project_details[$i]['Supervisor'];
		$psuprvisor_name=get_faculty_name_details($psuprvisor)
 ?>
		<option value="<?php echo $pcode;?>"><?php echo $pcode." ".$ptitle."-".$psuprvisor_name['fname']." ".$psuprvisor_name['lname'];?></option>
		<?php    }

 ?> 
 </select>
</td>

</tr>
<tr>
<td>
	
   <label>Enter the Project Supervisor:</td>;

<?php 
    echo '<td><select name="superviser">';
    echo '<option value="">Select any one</option>';

		for ($i=0;$i<sizeof($faculty_details);$i++) {
        $name =  $faculty_details[$i]['fname'].$faculty_details[$i]['lname'];
		$facultycode = $faculty_details[$i]['faculty_code'];
 ?>
		<option value="<?php echo $facultycode;?>"><?php echo $name;?></option>
		<?php    }

  
    echo '</select>';
    echo '</label>';

?>
</td>
</tr>
<tr>
<td>
<?php
	echo '<label>Enter the Project Co-Supervisor:</td>';
    echo '<td><select name="co_superviser">';
    echo '<option value="">Select any one</option>';
		for ($i=0;$i<sizeof($faculty_details);$i++) {
        $name =  $faculty_details[$i]['fname'].$faculty_details[$i]['lname'];
		$facultycode = $faculty_details[$i]['faculty_code'];
 ?>
		<option value="<?php echo $facultycode;?>"><?php echo $name;?></option>
		<?php    }

    echo '</select>';
    echo '</label>';

?>
</td></tr>
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
