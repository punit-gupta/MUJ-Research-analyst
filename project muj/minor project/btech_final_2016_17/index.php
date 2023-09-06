<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user']))
{
	if(($_SESSION['login_user']=="admin")||($_SESSION['login_user']=="adm"))
	{
		header("location: action.php");
	}
	else 
	{
		header("location: add_entry.php");
	}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<SCRIPT language=JavaScript>
var message = "function disabled";
function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
document.onmousedown = rtclickcheck;
</SCRIPT>
</head>
<body>
<div id="main">
<div id="login">
  <div id="mhead"><h2>Login Form</h2></div>
<br /><br /><br />
<form action="" method="post">
<table id='formtable'  cellspacing="0" style="margin-left:450px;">
<tr>
<td><label>UserName :</label></td>
<td><input id="name" name="username" type="text"></td>
</tr>
<tr>
<td><label>Password :</label></td>
<td><input id="password" name="password"  type="password"></td>
</tr>
<tr>
<td> </td><td></td></tr>
<tr>
<td colspan="2"><input name="submit" type="submit" value=" Login "></td>
</tr>
</table>
<span class="err"><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>