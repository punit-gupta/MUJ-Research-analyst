<?php
require_once('/includes/session.php');
require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');

$group_data=get_group_data();


	
	 

		
	
	

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
<div id="divToPrint">
 <div id="mhead"><h2>Groups</h2></div>
<table id='demotable'  cellspacing="0">
<tr class="head">

<td>Group No. </td>
<td>Old Group no</td>
<td>Enroll No</td>
<td>Name</td>
<td>Project Title</td>
<td>Supervisor</td>
<!--<td>Co-Supervisor</td>-->
<td>Action</td>
</tr>
<?php
$aaa=sizeof($group_data);


if ($aaa != 0) {
        

    for ($i=0;$i<$aaa;$i++) 
	{
		//$j=$i+1;
		$group = $group_data[$i]['group_no'];
		$old_group = $group_data[$i]['old_group_no'];
		$group_student_data=get_group_student_data($group);
		$bbb=sizeof($group_student_data);

		$project_title = get_project_title_by_proj_id($group_data[$i]['project']);
		$project_supervisor = get_faculty_name_details($group_data[$i]['Supervisor']);
		$project_cosupervisor = get_faculty_name_details($group_data[$i]['co_supervisor']);
		
		$group_student_data=get_group_student_data($group);
		$bbb=sizeof($group_student_data);
		if ($bbb != 0) {
			for ($j=0;$j<$bbb;$j++) 
			{
				$enroll_mem1 = $group_student_data[$j]['enroll_no'];
				$name_mem1 = $group_student_data[$j]['fname']. " " . $group_student_data[$j]['lname'];
        echo '<tr><td><a href="edit_student_group_data.php?grp_no='.$group.'">'.$group.'</a></td>';
        echo '<td>'.$old_group.'</td>';
		echo '<td><a href="edit_student.php?enroll='.$enroll_mem1.'">'.$enroll_mem1.'</a></td><td>'.$name_mem1.'</td>';
		echo '<td>'.$project_title.'</td><td>'.$project_supervisor['fname']." ".$project_supervisor['lname'].'</td><td>'.$project_cosupervisor['fname']." ".$project_cosupervisor['lname'].'</td></tr>';

			}
		}
		
    }

}

?>
</table>

</div> <!--end of divtoPrint -->

<div id="printbutton">
  <input type="button" value="Print" onclick="PrintDiv();" />
</div>
 </body>
</html>
