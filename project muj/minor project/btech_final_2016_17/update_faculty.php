<?php

require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');



if ($_GET['update_id'])
{
	$faculty_id=$_GET['update_id'];
	$faculty_data=get_faculty_name_details($faculty_id);
}


if (isset($_POST['submit'])) 
{
	if (empty($_POST['fname']))
	{
		$error = "Please enter the faculty name";
	}
	
	
	if (empty($_POST['fcode'])) 
	{
		$error = "Please enter the valid faculty code";
	}
	else
	{
		$fa_name=$_POST['fname'];
		$fa_code=$_POST['fcode'];
		$qry="UPDATE faculty SET name='".$fa_name."', faculty_code='".$fa_code."' WHERE sr_no=".$faculty_id.";";
	mysql_query($qry);

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
</SCRIPT>
 </head>
 <body>
    <h2>Update Faculty Data</h2>
<form action="" method="post">
<label>Name:</label>
<input id="name" name="fname"  type="text" value="<?php $faculty_data['name']; ?>">
<label>Faculty Code :</label>
<input id="fcode" name="fcode" type="password" value="<?php $faculty_data['code']; ?>>
<input name="submit" type="submit" value=" Enter ">
<span><?php echo $error; ?></span>
</form>

<?php
mysql_close($conn); // Closing Connection

?>
</table>
 </body>
</html>