<?php

require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');



if ($_GET['delete_id'])
{
	$del_Code=$_GET['delete_id'];
	mysql_query("DELETE FROM faculty WHERE faculty_code=$del_Code");
}


$query = "select name, faculty_code from faculty;";
$result = mysql_query($query);

	
	 

		
	
	

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
 </head>
 <body>
    <h2>Faculty</h2>
<table>
<tr>
<th>Sr. No. </th>
<th>Name</th>
<th>Faculty Code</th>
</tr>
<?php
if ($result != 0) {
    

    $num_results = mysql_num_rows($result);
    for ($i=1;$i<=$num_results;$i++) {
        $row = mysql_fetch_array($result);
		$fid=$row['sr_no'];
        $name = $row['name'];
		$facultycode = $row['faculty_code'];
        echo '<tr><td>'.$i.'</td><td>'.$name.'</td><td>'.$facultycode.'</td><td><a href="update_faculty.php?update_id='.$fid.'">Update</a></td><td><a href="faculty.php?delete_id=\''.$fid.'\'">Delete</a></td></tr>';
		
    }

}
mysql_close($conn); // Closing Connection

?>
</table>
 </body>
</html>
