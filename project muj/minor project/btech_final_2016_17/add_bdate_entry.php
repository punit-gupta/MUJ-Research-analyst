﻿<?php

require_once('/includes/session.php');


require_once ('/includes/functions.php');

$error=''; // Variable To Store Error Message

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
 <script src="datetimepicker_css.js"></script>

<!--<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="my_script.js"></script>-->
 <link rel="stylesheet" type="text/css" href="style1.css" />
 

<SCRIPT language=JavaScript>
var message = "function disabled";
function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
document.onmousedown = rtclickcheck;
</SCRIPT>
<SCRIPT language=JavaScript>
function my_onkeydown_handler() {
    switch (event.keyCode) {
        case 116 : // 'F5'
            event.preventDefault();
            event.keyCode = 0;
            window.status = "F5 disabled";
            break;
		case 82 : //R button
			if (event.ctrlKey){ 
				event.returnValue = false;
				event.keyCode = 0;
				return false;
			}
    }
}
document.addEventListener("keydown", my_onkeydown_handler);
 </SCRIPT>

</head>
 <body>
  <?php
include('/includes/header.php');
?>


  <div id="mhead"><h2>Add Entry</h2></div>

<form id="forms" action="add_backdate_entry.php" method="get">
<table id='formtable'  cellspacing="0">
<tr>
<td><label for="demo1">Please enter a date here &gt;&gt; </label></td>
<td><input type="Text" id="demo1" maxlength="25" size="25" name="demo1" />
     <img src="images/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer"/></td>
	 </tr>

<tr>
<td></td>
<td><input name="submit" type="submit" value=" Enter "></td>
</tr>



</table>
</form>





 </body>
</html>
