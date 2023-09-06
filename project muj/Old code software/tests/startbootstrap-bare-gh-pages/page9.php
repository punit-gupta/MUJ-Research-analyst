



<html>
<head>
	<meta charset="utf-8">
	<title>MUJPUB</title>

	<!-- Demo styling -->
	<link href="docs/css/jq.css" rel="stylesheet">

	<!-- jQuery: required (tablesorter works with jQuery 1.2.3+) -->
	<script src="docs/js/jquery-1.2.6.min.js"></script>

	<!-- Pick a theme, load the plugin & initialize plugin -->
	<link href="dist/css/theme.default.min.css" rel="stylesheet">
	<script src="dist/js/jquery.tablesorter.min.js"></script>
	<script src="dist/js/jquery.tablesorter.widgets.min.js"></script>
	<script>
	$(function(){
		$('table').tablesorter({
			widgets        : ['zebra', 'columns'],
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true
		});
	});
	</script>

        <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
      <body>
	  
	 
      
	  
<div class="topnav">

  <a class="active" href="page1_1.php">Home</a>
  <a href="page2.php">All Article</a>
  <a href="page3.php">Journal/Conference</a>
  <a href="page4.php">Authors</a>
  <a href="page5.php">Year</a>
  <a href="page6.php">All Search</a>
  <a href="update.php">Update</a>
  <a href="doi.php">DOI Search</a>
</div>

<br><br>

   
<?php
    if( !isset($_POST['field'])&&!isset($_POST['name1'])) 
   {
	   echo "error";
   }
   else{
      $field=$_POST['field']; 
	  $name1=$_POST['name1']; 
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub";
$sno = 1;
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query3 = "SELECT * FROM author WHERE $field='$name1'";
$result3 = mysqli_query($connect, $query3);

?>


<div  class="table-responsive-sm">

<table class="tablesorter" class="table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Title</th>
				<th>Author</th>
				<th>Journal/Conference</th>
				<th>year</th>
				<th>Doi</th>
				<th>Type</th>
				
			</tr>
		</thead>
		<tbody>
		 <tbody>
           
            <!-- populate table from mysql database -->
            <?php 
			while($row3 = mysqli_fetch_array($result3)):;
			
				$query = "SELECT * FROM article WHERE doi='$row3[1]'";
				$result = mysqli_query($connect, $query);
				while($row1 = mysqli_fetch_array($result)):;
					$query1 = "SELECT * FROM author where doi='$row1[6]'";
					$result1 = mysqli_query($connect, $query1);
					$auth='';
					 $rowcount=mysqli_num_rows($result1);
					 $o=1;
					while($row2 = mysqli_fetch_array($result1)):;
					$rowcount--;
					if($rowcount==$o)
					{
					$auth=$auth."and ".$row2[0];
					
					}
					else
					{$auth=$row2[0].", ".$auth;
						
					}
					
					endwhile;
			?>
            <tr>
                <td><?php echo $sno;?></td>
                <td><?php echo $row1[1];?></td>
                <td><?php echo $auth;?></td>
				<td><?php echo $row1[2];?></td>
                <td><?php echo $row1[3];?></td>
				<td><a href=page7.php?name=<?php echo $row1[6];?> ><?php echo $row1[6];?></a></td>
				<td><?php echo $row1[17];?></td>
            </tr>
            <?php $sno=$sno+1;endwhile;
			endwhile;?> 
            
        </tbody>
			
	</table>
</div>		
   <?php }?> 

    </body>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.footable').footable();
    });
    </script>
</html>