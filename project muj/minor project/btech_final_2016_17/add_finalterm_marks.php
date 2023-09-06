<?php
require_once('/includes/session.php');

include('/includes/functions.php');

$error=''; // Variable To Store Error Message


if (isset($_GET['enroll']))
{
	$rec=$_GET['enroll'];
	$rec_data=get_student_details($rec);
	$recsupervisor=$rec_data['project_supervisor'];
	$recexaminer1=$rec_data['T2_Examiner1'];
	$recmarks1=$rec_data['T2_Marks1'];
	$recexaminer2=$rec_data['T2_Examiner2'];
	$recmarks2=$rec_data['T2_Marks2'];
	$recsmarks=$rec_data['T2_supervisor_marks'];

}
else
{
	$rec="";
	$recsupervisor="";
	$recexaminer1="";
	$recmarks1="";
	$recexaminer2="";
	$recmarks2="";
	$recsmarks="";
}



if (isset($_POST['submit'])) 
{
	if (empty($_POST['enroll']))
	{
		$error = "Please enter the enrollment number";
	}
	
	
	if (empty($_POST['examiner1'])) 
	{
		$ex1_exists=0;
	}
	else
	{
		$ex1_exists=1;
	}
	
	if (empty($_POST['examiner2'])) 
	{
		$ex2_exists=0;
	}
	else
	{
		$ex2_exists=1;
	}
	
	if (empty($_POST['marks1'])) 
	{
		$m1_exists=0;
	}
	else
	{
		$m1_exists=1;
	}
	
	if (empty($_POST['marks2'])) 
	{
		$m2_exists=0;
	}
	else
	{
		$m2_exists=1;
	}
	if (empty($_POST['smarks'])) 
	{
		$sm_exists=0;
	}
	else
	{
		$sm_exists=1;
	}	
	$enrollment=$_POST['enroll'];
	$examiner1=$_POST['examiner1'];
	$marks1=$_POST['marks1'];
	$examiner2=$_POST['examiner2'];
	$marks2=$_POST['marks2'];
	$smarks=$_POST['smarks'];
	
	$enroll_exists=enrollment_no_exists($enrollment);
	$str="UPDATE student SET ";
	if ($ex1_exists==1)
	{
		$str1 = "T2_Examiner1='".$examiner1."', ";
	}
	else
	{
		$str1 ="";
	}

	if ($ex2_exists==1)
	{
		$str2 = "T2_Examiner2='".$examiner2."', ";
	}
	else
	{
		$str2 ="";
	}

	if ($m1_exists==1)
	{
		$str3 = "T2_Marks1=".$marks1.", ";
	}
	else
	{
		$str3 ="";
	}

	if ($m2_exists==1)
	{
		$str4 = "T2_Marks2=".$marks2.", ";
	}
	else
	{
		$str4 ="";
	}
	if ($sm_exists==1)
	{
		$str5 = "T2_supervisor_marks=".$smarks.", ";
	}
	else
	{
		$str5 ="";
	}
	echo $total_marks=$marks1+$marks2+$smarks;

	$str6="T2_total_marks=".$total_marks;

	if ($enroll_exists>0)
	{
		$qry=$str.$str1.$str2.$str3.$str4.$str5.$str6." WHERE enroll_no=".$enrollment.";";
		mysql_query($qry);
			mysql_close($connection); // Closing Connection

		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else 
	{
			mysql_close($connection); // Closing Connection

		$error = "Please enter the valid enrollment number";
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

<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="myscript2.js"></script>
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
  <div id="mhead"><h2>Add Final Presentation Marks</h2></div>
<?php 
if ($login_session=='admin')
{
	?>

<form action="" method="post">
<table id='formtable'  cellspacing="0">
<tr>
<td><label>Enrollment Number:</label></td>
<td><label>Supervisor :</label></td>
<td><label>Supervisor Marks:</label>
</td>
<td><label>Examiner 1 :</label></td>
<td><label>Marks 1:</label>
</td>
<td><label>Examiner 2:</label>
</td>
<td><label>Marks 2:</label>
</td>
<td></td>
<?php
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("btech_final_016_17", $connection);

	$faculty_details=get_faculty_data();
?>

</tr>
<tr>
<td><input id="enroll" name="enroll"  type="text" value="<?php echo $rec;?>">
</td>
<td> <input id="supervisor" name="supervisor"  type="text" value="<?php echo $recsupervisor;?>">  
</td>
<td><input id="smarks" name="smarks"  type="text" value="<?php echo $recsmarks;?>">
</td>

<td>    <select name="examiner1">
   <option value="">Select any one</option>
<?php	
		for ($i=0;$i<sizeof($faculty_details);$i++) {
        $name =  $faculty_details[$i]['fname'].$faculty_details[$i]['lname'];
		$facultycode = $faculty_details[$i]['faculty_code'];
 ?>
		<option value="<?php echo $facultycode;?>" <?php if ($recexaminer1==$facultycode){?> selected <?php }?>><?php echo $name;?></option>
		<?php    }

 ?> 
 </select>
</td>

<td><input id="marks1" name="marks1"  type="text" value="<?php echo $recmarks1;?>">
</td>
<td><?php	
    echo '<select name="examiner2">';
    echo '<option value="">Select any one</option>';
		for ($i=0;$i<sizeof($faculty_details);$i++) {
        $name =  $faculty_details[$i]['fname'].$faculty_details[$i]['lname'];
		$facultycode = $faculty_details[$i]['faculty_code'];
        ?>
		<option value="<?php echo $facultycode;?>" <?php if ($recexaminer2==$facultycode){?> selected <?php }?>><?php echo $name;?></option>
		<?php
    }
    echo '</select>';
    echo '</label>';

?>
</td>
<td><input id="marks2" name="marks2"  type="text" value="<?php echo $recmarks2;?>">
</td>
<td><input name="submit" type="submit" value=" Enter ">
</td>
</tr>



</table>




</form>


<div id="auto">
</div> <!--   end of auto -->
		<div><a href="view_student_finaltermmarks.php">Print Final Presentation Marks</a></div>
<?php
}
else
{
	$error="You are not authorised to view this page";
		mysql_close($connection); // Closing Connection

}

?>
<span class="err"><?php echo $error; ?></span>


 </body>
</html>
