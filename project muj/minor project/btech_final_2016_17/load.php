<?php
require_once ('/includes/db_config.php');
require_once ('/includes/functions.php');
$today_date=date("Y-m-d");
?>

<table  id='demotable'  cellspacing="0">
<tr class="head">
<td>Sr.No</td>
<td>Enroll No.</td>
<td>Name</td>
<td>Intime</td>
<td>Duration</td>

</tr>
<?php
		
		$current_in_entries=get_in_entry_details($today_date);
		$aaa=sizeof($current_in_entries);
if ($aaa != 0) {
    

    for ($i=0; $i<$aaa; $i++)
	{
		$j=$i+1;
		$entry_no= $current_in_entries[$i]['sr_no'];
		$view_enroll= $current_in_entries[$i]['enroll_no'];
        $view_name = get_student_name_by_id($view_enroll);
		$view_intime = $current_in_entries[$i]['in_time'];
		$view_duration=get_time_duration($view_intime);
		$t= date("h:i:s a",strtotime($view_intime));
		?>
		<form action="" method="post">
		<?php
        echo "<tr><td>".$j."</td><td>".$view_enroll."</td><td>".$view_name."</td><td>".$t."</td><td>";
		if ($view_duration['hours']>0)
		{
			echo $view_duration['hours']." hours ";
		}
		if ($view_duration['minutes']>0)
		{
			echo $view_duration['minutes']." minutes ";
		}
		echo $view_duration['seconds']."seconds"."</td></tr>";
		?>

		</form>
		<?php
    }

}
else
{
	echo "<tr><td colspan='8'>No Student Logged In Currently</td></tr>";
}


?>
</table>
