<?php
include('db.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con);
}
function saveData($data,$con){
  
 
   $fname = $con->real_escape_string($data['fname']);
  $lname = $con->real_escape_string($data['lname']);
  $fcode = $con->real_escape_string($data['fcode']);
  $email = $con->real_escape_string($data['email']);
  $sql = "insert into faculty(fname,lname,faculty_code,email) values('$fname','$lname','$fcode','$email')";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
  echo "error";
  }
  
}
function showData($data,$con){
  $sql = "select * from faculty order by sr_no asc";
  $data = $con->query($sql);
  $str='<tr class="head"><td>Firstname</td><td>Lastname</td><td>Faculty Code</td><td>Email</td><td></td></tr>';
  if($data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="<tr id='".$row['sr_no']."'><td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['faculty_code']."</td><td>".$row['email']."</td><td><input type='button' class='ajaxedit' value='Edit'/> <input type='button' class='ajaxdelete' value='Delete'></td></tr>";
   }
   }else{
    $str .= "<td colspan='5'>No Data Available</td>";
   }
   
echo $str;   
}
function updateData($data,$con){
  $fname = $con->real_escape_string($data['fname']);
  $lname = $con->real_escape_string($data['lname']);
  $fcode = $con->real_escape_string($data['fcode']);
  $email = $con->real_escape_string($data['email']);
  $editid = $con->real_escape_string($data['editid']);
 echo $sql = "update faculty set fname='$fname',lname='$lname',faculty_code='$fcode',email='$email' where sr_no=$editid";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
   echo "error";
  }
  }
  function deleteData($data,$con){
    $delid = $con->real_escape_string($data['deleteid']); 
	$sql = "delete from faculty where sr_no=$delid";
	if($con->query($sql)){
	  showData($data,$con);
	}
	else{
	echo "error";
	}
  }
?>