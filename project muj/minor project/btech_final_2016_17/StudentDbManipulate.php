<?php
include('db.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con);
}
function saveData($data,$con){
  
   $enrno = $con->real_escape_string($data['enrno']);
   $fname = $con->real_escape_string($data['fname']);
  $lname = $con->real_escape_string($data['lname']);
  $ptitle = $con->real_escape_string($data['ptitle']);
  $superv = $con->real_escape_string($data['superv']);
  $sql = "insert into student(enroll_no,fname,lname,project_title,project_supervisor) values($enrno,'$fname','$lname','$ptitle','$superv')";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
  echo "error";
  }
  
}
function showData($data,$con){
  $sql = "select * from student order by enroll_no asc";
  $data = $con->query($sql);
  $str='<tr class="head"><td>Enrollment No.</td><td>Firstname</td><td>Lastname</td><td>Project Title</td><td>Supervisor</td><td></td></tr>';
  if($data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="<tr id='".$row['enroll_no']."'><td>".$row['enroll_no']."</td><td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['project_title']."</td><td>".$row['project_supervisor']."</td><td><input type='button' class='ajaxedit' value='Edit'/> <input type='button' class='ajaxdelete' value='Delete'></td></tr>";
   }
   }else{
    $str .= "<td colspan='5'>No Data Available</td>";
   }
   
echo $str;   
}
function updateData($data,$con){
    $enrno = $con->real_escape_string($data['enrno']);
$fname = $con->real_escape_string($data['fname']);
  $lname = $con->real_escape_string($data['lname']);
  $ptitle = $con->real_escape_string($data['ptitle']);
  $superv = $con->real_escape_string($data['superv']);
  $editid = $con->real_escape_string($data['editid']);
 echo $sql = "update student set enroll_no=$enrno, fname='$fname',lname='$lname',project_title='$ptitle',project_supervisor='$superv' where enroll_no=$editid";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
   echo "error";
  }
  }
  function deleteData($data,$con){
    $delid = $con->real_escape_string($data['deleteid']); 
	$sql = "delete from student where enroll_no=$delid";
	if($con->query($sql)){
	  showData($data,$con);
	}
	else{
	echo "error";
	}
  }
?>