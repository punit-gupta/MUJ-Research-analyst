<?php
require_once('/includes/session.php');
require_once ('/includes/functions.php');
$error=''; // Variable To Store Error Message
//$prev_grp=get_max_grp_no();
//$new_group=$prev_grp+1;

if (isset($_GET['grp_no'])) 
{
	$grp=$_GET['grp_no'];
	$group_data=get_group_data_by_grpid($grp);
	$project=$group_data['project'];
	$suprvsr=$group_data['Supervisor'];
}


if (isset($_POST['submit'])) 
{
	
	//echo $grp;
	$proj_title=$_POST['protitle'];
	$stu_supervisor=$_POST['superviser'];
	$stu_cosupervisor=$_POST['co_superviser'];
	$query = "UPDATE groups SET project=".$proj_title.", Supervisor='".$stu_supervisor."', co_supervisor='".$stu_cosupervisor."' WHERE group_no=".$grp.";";
	mysql_query($query);		
	
/*
group_no, project, Supervisor
	if ($_POST['mem1'])
	{
		$mem1=$_POST['mem1'];
		$query = "UPDATE student SET group_no=".$new_group.", project=".$proj_title.", project_supervisor='".$stu_supervisor."', co_supervisor='".$stu_cosupervisor."' WHERE enroll_no=".$mem1.";";
		mysql_query($query);
	}

	if ($_POST['mem2'])
	{	
		$mem2=$_POST['mem2'];
		$query = "UPDATE student SET group_no=".$new_group.", project=".$proj_title.", project_supervisor='".$stu_supervisor."', co_supervisor='".$stu_cosupervisor."' WHERE enroll_no=".$mem2.";";
		mysql_query($query);		
	}

	if ($_POST['mem3'])
	{
		$mem3=$_POST['mem3'];
		$query = "UPDATE student SET group_no=".$new_group.", project=".$proj_title.", project_supervisor='".$stu_supervisor."', co_supervisor='".$stu_cosupervisor."' WHERE enroll_no=".$mem3.";";
		mysql_query($query);	
	}grp_no='.$group
*/
	$error="The Group Information has been changed";
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
  <div id="mhead">   <h2>Edit Student Group Data</h2></div>
<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Group Number:</label></td>
<td><label><?php echo $grp; ?></label></td>
</tr>
<?php
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db($db_name, $connection);
	$student_group_data=get_group_student_data($grp);
	$faculty_details=get_facultydata();
	$project_details=get_project_data();
?>
<tr><td></td><td></td></tr>
<tr>
<td><label>Group Members:</label></td><tr>
 
<?php	
		for ($i=0;$i<sizeof($student_group_data);$i++) {
        $en_no =  $student_group_data[$i]['enroll_no'];
		$s_name = $student_group_data[$i]['fname']." ".$student_group_data[$i]['lname'];

 ?>
<tr><td><label><?php echo $en_no; ?></label></td><td><label><?php echo $s_name; ?></label></td></tr>
<?php 
}
 ?>
 
</tr>
<tr><td></td><td></td></tr><tr><td></td><td></td></tr>
<tr>
<td><label>Enter the Project Title:</label></td>

<td>    <select name="protitle">
   <option value="">Select any one</option>
<?php	
		for ($i=0;$i<sizeof($project_details);$i++) {
        $ptitle =  $project_details[$i]['project_title'];
		$pcode = $project_details[$i]['sr_no'];
		$psuprvisor=$project_details[$i]['Supervisor'];
 ?>
		<option value="<?php echo $pcode;?>" <?php if ($project==$pcode) echo " selected"; ?>><?php echo $pcode." ".$ptitle;?></option>
		<?php    }

 ?> 
 </select>
</td>

</tr>
<tr>
<td>


<?php 
    echo '<label>Enter the Project Supervisor:</td>';
    echo '<td><select name="superviser">';
    echo '<option value="">Select any one</option>';

		for ($i=0;$i<sizeof($faculty_details);$i++) {
        $name =  $faculty_details[$i]['fname'].$faculty_details[$i]['lname'];
		$facultycode = $faculty_details[$i]['faculty_code'];
 ?>
		<option value="<?php echo $facultycode;?>" <?php if ($suprvsr==$facultycode) echo " selected"; ?>><?php echo $name;?></option>
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
