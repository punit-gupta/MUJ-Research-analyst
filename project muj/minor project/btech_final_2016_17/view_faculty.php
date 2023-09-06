<?php
require_once('/includes/session.php');
require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');
		
$faculty_data=get_faculty_data();

	
	 

		
	
	

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
 <div id="mhead">   <h2>Faculty</h2></div>
<table id='demotable'  cellspacing="0">
<tr class="head">
<td>Sr. No. </td>
<td>Name</td>
<td>Faculty Code</td>
</tr>
<?php
$aaa=sizeof($faculty_data);
if ($aaa != 0) {
        

    for ($i=0;$i<$aaa;$i++) 
	{
		$j=$i+1;
		$name = $faculty_data[$i]['fname']. " " . $faculty_data[$i]['lname'];
		$facultycode = $faculty_data[$i]['faculty_code'];
        echo '<tr><td>'.$j.'</td><td>'.$name.'</td><td>'.$facultycode.'</td></tr>';
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
