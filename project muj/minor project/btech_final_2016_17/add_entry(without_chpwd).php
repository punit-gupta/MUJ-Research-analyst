<?php
require_once('/includes/session.php');
require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');
$today_date=date("Y-m-d");
$error=''; // Variable To Store Error Message


if (isset($_GET['entry_no'])) 
{
	$entry_no=$_GET['entry_no'];
	$action=$_GET['action'];
	if ($action==1)
	{
		$enroll=$_GET['enroll'];
		$date_time=get_curdate_time();
		$e_data=get_in_entry_details_student($enroll);
		$in_time=$e_data['in_time'];
		$time_spent=get_timediff_in_sec($in_time,$date_time);
		
		$qry="UPDATE entry_details SET out_time='".$date_time."', duration=".$time_spent." WHERE sr_no=".$entry_no.";";
		mysql_query($qry); 
		$qry1="delete from entry_list where enroll_no=$enroll";
		mysql_query($qry1); 
		header("Location: ".$_SERVER['PHP_SELF']);

	}
	else if ($action==2)
	{
		$enroll=$_GET['enroll'];
		$date_time=get_curdate_time();
	$query="update entry_details set out_time='".$date_time."',disapproved=1 where sr_no=$entry_no";
	mysql_query($query); 
			echo $qry1="delete from entry_list where enroll_no=$enroll";
		mysql_query($qry1); 
		$qry2="UPDATE student SET prev_entry_status=1 WHERE enroll_no=".$enroll.";";
		mysql_query($qry2);

		header("Location: ".$_SERVER['PHP_SELF']);
	}
	
}
	
if (isset($_POST['submit'])) 
{
	$date1=$_POST["demo1"];
	$startDate = date("Y-m-d", strtotime($date1));
	$date2=$_POST["demo2"];
	$endDate = date("Y-m-d", strtotime($date2));
	$entry_data=get_entry_details($startDate,$endDate);
	$a=1;

}
else
{
	$startDate = $today_date;
	$endDate = "";
	$entry_data=get_in_entry_details($startDate,$endDate);
	$a=2;

}

?>
<!DOCTYPE html>
<html>
<head>
 <script src="datetimepicker_css.js"></script>


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
</head>
<body>
 <?php
include('/includes/header.php');
?>
  <div id="mhead"><h2>View Entries</h2></div>
<?php 
if ($login_session=='admin')
{
	?>


<form name="tstest" method="post"  id="forms">
<table id='formtable'  cellspacing="0">
<tr>
<td><label for="demo1">Please enter a date here &gt;&gt; </label></td>
<td><input type="Text" id="demo1" maxlength="25" size="25" name="demo1" /><img src="images/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer"/></td>
</tr>
<tr>
<td><label for="demo1">Please enter a date here &gt;&gt; </label></td>
<td><input type="Text" id="demo2" maxlength="25" size="25" name="demo2" /><img src="images/cal.gif" onclick="javascript:NewCssCal('demo2')" style="cursor:pointer"/></td>
</tr>
<tr>
<td colspan='2'><input name="submit" type="submit" value="Submit" /></td>
</tr>
</table>
</form>

<div id="divToPrint">

<div>
<table  id='demotable'  cellspacing="0">
<tr class="head">
<td>Sr.No.</td>
<td>Enroll No.</td>
<td>Name</td>
<td>Date</td>
<td>Intime</td>
<td>Outtime</td>
<td>Duration</td>
<?php if ($a==2) {?><td colspan='2'>Action</td><?php } ?>
</tr>
<?php
		
		$aaa=sizeof($entry_data);
if ($aaa != 0) {
    

    for ($i=0; $i<$aaa; $i++)
	{
		$j=$i+1;
		$entry_no= $entry_data[$i]['sr_no'];
		$view_enroll= $entry_data[$i]['enroll_no'];
        $view_name = get_student_name_by_id($view_enroll);
		$view_indate=$entry_data[$i]['indate'];
		$view_intime = $entry_data[$i]['in_time'];
				$t= date("h:i a",strtotime($view_intime));
		$view_outtime = $entry_data[$i]['out_time'];
		if ($view_outtime == "00:00:00")
			$t1="";
		else
			$t1= date("h:i a",strtotime($view_outtime));
		if ($a==1)
		{
			if ($view_outtime == "00:00:00")
				$view_duration=="";
			else
				$view_duration=get_time_worked($view_intime, $view_outtime);
}
		else if($a==2)
			$view_duration=get_time_duration($view_intime);
		
		?>

       <tr><td><?php echo $j; ?></td><td> <?php echo $view_enroll; ?></td><td><?php echo $view_name; ?></td><td><?php echo $view_indate; ?></td><td><?php echo $t; ?></td><td><?php echo $t1; ?></td>
	   <td>
		<?php
		if ($view_duration['hours']>0)
		{
			echo $view_duration['hours']." hours ";
		}
		if ($view_duration['minutes']>0)
		{
			echo $view_duration['minutes']." minutes ";
		}
		echo $view_duration['seconds']."seconds"."</td>";
		?>
		</td>
	  
	  <?php if ($a==2) {?><td><a href='get_att.php?entry_no=<?php echo $entry_no; ?>&action=1&enroll=<?php echo $view_enroll; ?>'>Mark Out</a>
	  </td><td><a href='get_att.php?entry_no=<?php echo $entry_no; ?>&action=2&enroll=<?php echo $view_enroll; ?>'>Disapprove</a></td><?php } ?></tr>
<?php
    }

} 
else
{
	echo "<tr><td colspan='8'>No Student Logged In Currently</td></tr>";
}
?>
</table>
</div>
</div> <!-- end of divtoPrint -->
<div id="printbutton">
  <input type="button" value="Print" onclick="PrintDiv();" />
</div>
<?php
}
else
{
	$error="You are not authorised to view this page";
}

?>
<span class="err"><?php echo $error; ?></span>

</body>
</html>