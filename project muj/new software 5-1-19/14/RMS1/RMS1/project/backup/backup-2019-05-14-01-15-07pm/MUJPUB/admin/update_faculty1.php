<?php
        $id=$_GET['id'];
        $uid=$_GET['uid'];
        $name=$_GET['name'];
	include 'database_conf.php'; 
		
    $query = "UPDATE `author` SET `emp` = '".$id."' WHERE author = '".$name."' and uid='".$uid."';";
    $result = mysqli_query($connect, $query);
    echo $query;
	if($result==true)
	{
	echo"<script>
         setTimeout(function(){
            window.location.href = 'update_faculty.php';
         }, 5000);
      </script>
      <p>Web page redirects after 5 seconds.</p>
	";}
?>