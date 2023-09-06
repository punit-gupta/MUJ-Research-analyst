<?php
require_once('/includes/session.php');

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
 <div id="mhead"><h2>Project Students Mid Term Marks</h2></div>
<table id='demotable'  cellspacing="0">
<tr class="head">
<td>Sr. No. </td>
<td>Enroll No.</td>
<td>Name</th>
<td>Supervisor Marks</td>
<td>Examiner1 Marks</td>
<td>Examiner2 Marks</td>
<td>Mid Presentation Marks</td>
</tr>
<?php
$aaa=sizeof($student_data);
if ($aaa != 0) {
        

    for ($i=0;$i<$aaa;$i++) 
	{
		$j=$i+1;
		$enroll = $student_data[$i]['enroll_no'];
		$name = $student_data[$i]['fname']. " " . $student_data[$i]['lname'];
		$super_marks = $student_data[$i]['T1_supervisor_marks'];
		$examiner1_marks = $student_data[$i]['T1_Marks1'];
		$examiner2_marks = $student_data[$i]['T1_Marks2'];
		$total_marks = $student_data[$i]['T1_total_marks'];
		
        echo '<tr><td>'.$j.'</td><td>'.$enroll.'</td><td>'.$name.'</td><td>'.$super_marks.'</td><td>'.$examiner1_marks.'</td><td>'. $examiner2_marks.'</td><td>'. $total_marks.'</td></tr>';
    }

}
	mysql_close($connection); // Closing Connection

?>
</table>

</div> <!--end of divtoPrint -->

<div id="printbutton">
  <input type="button" value="Print" onclick="PrintDiv();" />
</div>
 </body>
</html>
