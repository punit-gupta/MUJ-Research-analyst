<?php
require_once('/includes/session.php');
require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');
		
$student_data=get_student_data();

	
	 

		
	
	

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
 <div id="mhead"><h2>Students</h2></div>
<table id='demotable'  cellspacing="0">
<tr class="head">
<td>Sr. No. </td>
<td>Enroll No.</td>
<td>Name</th>
<td>Project Title</td>
<td>Supervisor</td>

</tr>
<?php
$aaa=sizeof($student_data);
if ($aaa != 0) {
        

    for ($i=0;$i<$aaa;$i++) 
	{
		$j=$i+1;
		$enroll = $student_data[$i]['enroll_no'];
		$name = $student_data[$i]['fname']. " " . $student_data[$i]['lname'];
		$project_title = $student_data[$i]['project_title'];
		$project_supervisor = get_faculty_name_details($student_data[$i]['project_supervisor']);
		
		//$co_supervisor = $student_data[$i]['co_supervisor'];
		
       echo '<tr><td>'.$j.'</td><td>'.$enroll.'</td><td>'.$name.'</td><td>'.$project_title.'</td><td>'.$project_supervisor['fname']." ".$project_supervisor['lname'].'</td></tr>';

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
