<?php
    $key=$_GET['key'];
    $array = array();
    include 'database_conf.php'; 
    $query=mysqli_query($connect, "select * from author where author LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['author'];
    }
    echo json_encode($array);
   
?>
