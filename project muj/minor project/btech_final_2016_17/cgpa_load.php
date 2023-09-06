<?php
require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');
$today_date=date("Y-m-d");
?>

<table  id='demotable'  cellspacing="0">
<tr  class="head">
<td>Sr.No</td>
<td>Enroll No.</td>
<td>Name</td>
<td colspan="2">CGPA</td>


</tr>
<?php
		
		$students=get_student_data();
		$aaa=sizeof($students);
if ($aaa != 0) {
    

    for ($i=0; $i<$aaa; $i++)
	{
		$j=$i+1;
		$entry_no= $students[$i]['sr_no'];
		$view_enroll= $students[$i]['enroll_no'];
        $view_name = $students[$i]['fname']." ".$students[$i]['lname'];
		$view_cgpa = $students[$i]['CGPA'];

		?>
		<?php
        echo "<tr><td>".$j."</td><td>".$view_enroll."</td><td>".$view_name."</td><td>".$view_cgpa."</td><td><a href='add_cgpa.php?enroll=$view_enroll'>Edit</a></td></tr>";
		?>
		<?php
    }

} 
	mysql_close($conn); // Closing Connection

?>
</table>
