<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
{
	
		$f_name=$_POST['fname'];
		$f_code=$_POST['fcode'];
		
		$conn =mysql_connect("localhost", "root", "") or die (mysql_error ());
		mysql_select_db("btech_final_2016_17", $conn);
		
		$query = "INSERT INTO faculty (name, faculty_code)
VALUES ('$f_name', '$f_code');";
		mysql_query($query);
		
	
	 

		
	
	mysql_close($conn); // Closing Connection
	
	
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
    <h2>Add Faculty</h2>
<form action="" method="post">
<label>Enter the Faculty Name:</label>
<input id="fname" name="fname" placeholder="fname" type="text">
<label>Enter the Faculty Code:</label>
<input id="fcode" name="fcode" placeholder="fcode" type="text">
<input name="submit" type="submit" value=" Enter ">
<span><?php echo $error; ?></span>
</form>
 </body>
</html>
