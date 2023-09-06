<?php 


function Logout()
{
	
	
	session_start();
	session_unset();
	session_destroy();

	$user="";
	$loginStatus = False;
	$EmpPower= 0;
	//self::$UserID = 0;
	$loginError = False;

}
	function get_student_password_by_id($id)
	{
		$query="select password from student WHERE enroll_no='$id';";		
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$student_name=mysql_result($query_result, 0);
		return $student_name;		
	}
	function get_student_name_by_id($id)
	{
		$query="select fname from student WHERE enroll_no='$id';";		
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$student_name=mysql_result($query_result, 0);
		return $student_name;		
	}
	
	function get_facultyemail($code)
	{
		$query="select email from faculty WHERE faculty_code like '$code';";		
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$student_name=mysql_result($query_result, 0);
		return $student_name;		
	}

	function get_cgpa($id)
	{
		$query="select CGPA from student WHERE enroll_no='$id';";		
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$cgpa=mysql_result($query_result, 0);
		return $cgpa;		
	}

	function get_max_grp_no()
	{
		$query="select max(group_no) from groups;";		
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$grp=mysql_result($query_result, 0);
		return $grp;		
	}

function get_student_details($enroll)
{
		$query="SELECT * from student where enroll_no='$enroll'";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$row=mysql_fetch_array($query_result, MYSQL_ASSOC);
		return $row;
}
function get_group_student_data($group)
{
		$query="SELECT * from student where group_no=$group order by enroll_no";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}

function get_group_data_by_supervisercode($superv)
{
		$query="SELECT group_no, project, old_group_no from groups where Supervisor like '".$superv."' order by old_group_no";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}
function get_group_data_by_grpid($group)
{
		$query="SELECT * from groups where group_no=$group";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$row=mysql_fetch_array($query_result, MYSQL_ASSOC);
		return $row;
}
function get_stud_data()
{
		$query="SELECT fname, lname, enroll_no from student order by enroll_no";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}
/*function get_student_data()
{
		$query="SELECT * from student order by enroll_no";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}*/
function get_group_data()
{
		$query="SELECT * from groups order by old_group_no";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}

function get_faculty_name_details($faculty_code)
{
		$query="SELECT * from faculty where faculty_code='$faculty_code'";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$row=mysql_fetch_array($query_result, MYSQL_ASSOC);
		return $row;
}

function get_curdate_time()
{
	//$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	//$cur_datetime=date("Y-m-d H:i:s", $time_now);
	$cur_datetime=date("Y-m-d H:i:s");

	return $cur_datetime;
}

function get_cur_time()
{
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$cur_datetime=date("H:i:s", $time_now);
	return $cur_datetime;
}
function get_time_worked($intime, $outtime)
{
			$to_time = strtotime($outtime);
		$from_time = strtotime($intime);
		//$duration= round(abs($to_time - $from_time) / 60,2). " minute";
		//return $duration;

		$diff    =    $to_time - $from_time;
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );

}
function get_time_duration($intime)
{
		$to_time = strtotime(get_curdate_time());
		$from_time = strtotime($intime);
		//$duration= round(abs($to_time - $from_time) / 60,2). " minute";
		//return $duration;

		 $diff    =    $to_time - $from_time;
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
}

function time_diff($temp_date)
	{
		$today=strtotime(get_curdate_time());
		$difference = $today - strtotime($temp_date);
		if($difference>0)
			$min=floor($difference / 60);
		else
			$min=0;
		return $min;
	}

function get_facultydata()
{
		$query="SELECT fname, lname, faculty_code, email from faculty";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}
/*function get_faculty_data()
{
		$query="SELECT fname, lname, faculty_code from faculty";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}*/

function get_project_data()
{
		$query="SELECT sr_no, project_title, Supervisor from projects";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}

function get_entry_list()
{
		$query="SELECT enroll_no from entry_list";
		$query_total_faculty = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_total_faculty);
		if($count)
		{
			while($row=mysql_fetch_array($query_total_faculty, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}


function convert_sec_to_hour_min($time_in_sec)
{
		if( $hours=intval((floor($time_in_sec/3600))) )
                $time_in_sec = $time_in_sec % 3600;
            if( $minutes=intval((floor($time_in_sec/60))) )
                $time_in_sec = $time_in_sec % 60;
            return( array('hours'=>$hours, 'minutes'=>$minutes) );
}

function convert_hrs_mins_to_secs($hours,$minutes)
{
		$seconds=($hours*3600)+($minutes*60);
		return $seconds;
}

function get_attendance($startDate,$endDate)
{
	if ($endDate=="1970-01-01")
	{
		$qry="truncate table attendance;";
		mysql_query($qry);
		$query="insert into attendance (enroll_no, attendance) SELECT DISTINCT enroll_no, sum( duration ) FROM full_entry_details WHERE indate ='".$startDate."'  GROUP BY enroll_no;";
		$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	}
	else 
	{
		$qry="truncate table attendance;";
		mysql_query($qry);
		$query="insert into attendance (enroll_no, attendance) SELECT DISTINCT enroll_no, sum( duration ) FROM full_entry_details where indate between '".$startDate."' and '". $endDate."' GROUP BY enroll_no;";
		$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	}

}

function get_attendance_by_enroll($enroll)
{
		$query="select * from attendance_displayed where enroll_no=".$enroll;
		$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$count=mysql_num_rows($query_site_contents);
		if($count)
		{
			while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
			{
				$query_result_data[]=$row;
			}
			return $query_result_data;
		}
}

function get_attendance_displayed_details()
{
	$query="select * from attendance_displayed order by enroll_no;";

	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}

function get_attendance_details()
{
	$query="select * from attendance order by enroll_no;";

	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}

function get_attendance_details_all_labs()
{
	$query="(select enroll_no, attendance from attendance) UNION (select enroll_no, attendance from attendance_other_labs) order by enroll_no;";

	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}

function get_manual_entry_detail($date)
{
	$query="select sr_no, enroll_no, indate, duration from full_entry_details where indate='".$date."' and in_time='00:00:00';";
	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}


function get_entry_detail($startDate,$endDate)
{
	if ($endDate=="1970-01-01")
		$query="select sr_no, enroll_no, indate, in_time, out_time, login_terminal, logout_terminal, duration from full_entry_details where indate='".$startDate."' and not login_terminal='';";
	else 
		$query="select sr_no, enroll_no, indate, in_time, out_time, login_terminal, logout_terminal, duration from full_entry_details where indate between '".$startDate."' and '". $endDate."' and duration>0 and not login_terminal='' order by indate desc;";

	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}

/*function get_entry_details($startDate,$endDate)
{
	if ($endDate=="1970-01-01")
		$query="select * from entry_details where indate='".$startDate."' and disapproved=0;";
	else 
		$query="select * from entry_details where indate between '".$startDate."' and '". $endDate."' and duration>0 and disapproved=0 order by indate desc;";

	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}*/

function get_in_time($entryno)
{
		$query="select in_time from entry_details WHERE sr_no=$entryno;";		
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$intime=mysql_result($query_result, 0);
		return $intime;	
}

function get_temp_left_time($entryno)
{
		$query="select temp_left from entry_details WHERE sr_no=$entryno;";		
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$temptime=mysql_result($query_result, 0);
		return $temptime;	
}

function get_in_entry_detail($indate)
{
	$query="SELECT sr_no, enroll_no, in_time FROM entry_details WHERE out_time = '00:00:00' and indate='$indate' and disapproved =0 ORDER BY in_time DESC;";
	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}

function get_in_etry_details($indate)
{
	$query="SELECT sr_no, enroll_no, indate, in_time, out_time, login_terminal, logout_terminal FROM entry_details ORDER BY in_time DESC;";
	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}
/*function get_in_entry_details($indate)
{
	$query="SELECT * FROM entry_details WHERE out_time = '00:00:00' and indate='$indate' and disapproved =0 ORDER BY in_time DESC;";
	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	if($count)
	{
		while($row=mysql_fetch_array($query_site_contents, MYSQL_ASSOC))
		{
			$query_result_data[]=$row;
		}
		return $query_result_data;
	}
}*/

function get_in_entry_details_stud($enroll_no)
{
	$today_date=date("Y-m-d");
	$query="SELECT sr_no, indate, in_time, login_terminal FROM entry_details WHERE enroll_no='$enroll_no';";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$row=mysql_fetch_array($query_result, MYSQL_ASSOC);
		return $row;
}

/*function get_in_entry_details_student($enroll_no)
{
	$today_date=date("Y-m-d");
	$query="SELECT * FROM entry_details WHERE out_time = '00:00:00' and indate='$today_date' and enroll_no='$enroll_no';";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$row=mysql_fetch_array($query_result, MYSQL_ASSOC);
		return $row;
}*/

function diffTime($bigTime,$smallTime)
{
//input format hh:mm:ss

        list($h1,$m1,$s1)=split(":",$bigTime);
        list($h2,$m2,$s2)=split(":",$smallTime);
       
        $second1=$s1+($h1*3600)+($m1*60);//converting it into seconds
        $second2=$s2+($h2*3600)+($m2*60);
       
       
        if ($second1==$second2)
        {
            $resultTime="00:00:00";
            return $resultTime;
            exit();
        }
       
       
       
        if ($second1<$second2) //
        {
            $second1=$second1+(24*60*60);//adding 24 hours to it.
        }
       
       
       
        $second3=$second1-$second2;
       
        //print $second3;
        if ($second3==0)
        {
            $h3=0;
        }
        else
        {
            $h3=floor($second3/3600);//find total hours
        }
           
        $remSecond=$second3-($h3*3600);//get remaining seconds
        if ($remSecond==0)
        {
            $m3=0;
        }
        else
        {
            $m3=floor($remSecond/60);// for finding remaining  minutes
        }
           
        $s3=$remSecond-(60*$m3);
       
        if($h3==0)//formating result.
        {
            $h3="00";
        }
        if($m3==0)
        {
            $m3="00";
        }
        if($s3==0)
        {
            $s3="00";
        }
           
        $resultTime="$h3:$m3:$s3";
       
       
        return $resultTime;

}

function get_timediff_in_sec($big_time,$small_time)
{
	$TimeStart = strtotime($big_time);
	$TimeEnd = strtotime($small_time);

	$Difference = ($TimeEnd - $TimeStart) ;
	return $Difference;

}

function enrollment_no_exists($enrollno)
{
	$query="SELECT password from student where enroll_no=$enrollno";
	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	return $count;
}

function check_if_already_there($enrollment)
{
	$query="SELECT enroll_no from entry_list where enroll_no=$enrollment";
	$query_site_contents = mysql_query($query) or die("SELECT Error: ".mysql_error());
	$count=mysql_num_rows($query_site_contents);
	return $count;
}
function get_project_title_by_proj_id($id)
{
	$query="SELECT project_title from projects where sr_no=$id";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$pass=mysql_result($query_result, 0);
		return $pass;	
}
function get_student_password($enrollno)
{
	$query="SELECT password from student where enroll_no=$enrollno";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$pass=mysql_result($query_result, 0);
		return $pass;	
}
function get_prev_entry_status($enrollno)
{
	$query="SELECT prev_entry_status from student where enroll_no=$enrollno";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$estatus=mysql_result($query_result, 0);
		return $estatus;	
}

function check_if_first_time_user($enrollno)
{
	$query="SELECT first_time_user from student where enroll_no=$enrollno";
		$query_result = mysql_query($query) or die("SELECT Error: ".mysql_error());
		$user_status=mysql_result($query_result, 0);
		return $user_status;	
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>