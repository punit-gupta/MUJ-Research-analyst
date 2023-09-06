


<!DOCTYPE html>
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

<br><br><br><br><br>

		<form action = "<?php $_PHP_SELF ?>" method = "POST" align=center>
		  <select name="name">
			<option value="title">title</option>
			<option value="journal">journal</option>
			<option value="year">year</option>
			<option value="document_type">document_type</option>
			<option value="source">source</option>
			<option value="publisher">publisher</option>
			<option value="affiliation">affiliation</option>
			<option value="issn">ISSN</option>
			<option value="isbn">ISBN</option>
		  </select>
		  <br><br>
		  <input type="submit">
		</form>
		
		<form action = "<?php $_PHP_SELF ?>" method = "POST" align=center>
		  <select name="field">
			
			<option value="journal">journal</option>
			<option value="year">year</option>
			<option value="document_type">document_type</option>
			<option value="source">source</option>
		  </select>
		  
		  <input type="text" placeholder="Enter" name="name1" required>
		  <br><br>
		  <input type="submit">
		</form>
		
		
		
		<form action = "<?php $_PHP_SELF ?>" method = "POST" align=center>
		  <select name="fie">
			<option value="title">title</option>
			<option value="doi">doi</option>
			<option value="issn">issn</option>
			<option value="isbn">isbn</option>
		  </select>
		  
		  <input type="text" placeholder="Enter" name="name1" required>
		  <br><br>
		  <input type="submit">
		</form>
	  
<?php

   if( isset($_POST['name'])) 
   {  $name=$_POST['name']; 
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub";
$sno = 1;
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT $name, COUNT(*) AS `num` FROM article GROUP BY $name";
$result = mysqli_query($connect, $query);

?>


<div class="table-responsive-sm">

<table class="tablesorter" class="table">
		<thead>
			<tr>
				<th>S.No</th>
				<th><?php echo $name;?></th>
				<th>Count</th>
				
			</tr>
		</thead>
		<tbody>
		 <tbody>
           
            <!-- populate table from mysql database -->
            <?php while($row1 = mysqli_fetch_array($result)):;
			?>
            <tr>
                <td><?php echo $sno;?></td>
                <form id="myForm<?php echo $sno;?>" action="page8.php" method="POST">
                <input type="hidden" name="name1" id="hiddenField" value="<?php echo $row1[0];?>"/>
				<input type="hidden" name="field" id="hiddenField" value="<?php echo $name;?>"/>
				<td> <a href="#" onclick="document.getElementById('myForm<?php echo $sno;?>').submit();"><?php echo $row1[0];?></a></td>
                </form>
                <td><?php echo $row1[1];?></td>
                
            </tr>
            <?php $sno=$sno+1;endwhile;?> 
            
        </tbody>
			
	</table>
</div>		
   <?php }?> 
   
<?php
    if( isset($_POST['field'])&&isset($_POST['name1'])) 
   {
      $field=$_POST['field']; 
	  $name1=$_POST['name1']; 
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub";
$sno = 1;
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT $field, COUNT(*) AS `num` FROM article WHERE $field='$name1' GROUP BY $field";
$result = mysqli_query($connect, $query);

?>


<div class="table-responsive-sm">

<table class="tablesorter" class="table">
		<thead>
			<tr>
				<th>S.No</th>
				<th><?php echo $field;?></th>
				<th>Count</th>
				
			</tr>
		</thead>
		<tbody>
		 <tbody>
           
            <!-- populate table from mysql database -->
            <?php while($row1 = mysqli_fetch_array($result)):;
			?>
            <tr>
                <td><?php echo $sno;?></td>
                <form id="myForm<?php echo $sno;?>" action="page8.php" method="POST">
                <input type="hidden" name="name1" id="hiddenField" value="<?php echo $row1[0];?>"/>
				<input type="hidden" name="field" id="hiddenField" value="<?php echo $field;?>"/>
				<td> <a href="#" onclick="document.getElementById('myForm<?php echo $sno;?>').submit();"><?php echo $row1[0];?></a></td>
                </form>
                <td><?php echo $row1[1];?></td>
                
            </tr>
            <?php $sno=$sno+1;endwhile;?> 
            
        </tbody>
			
	</table>
</div>		
   <?php }?> 
   
   
   <?php
    if( isset($_POST['fie'])&&isset($_POST['name1'])) 
   {
      $fie=$_POST['fie']; 
	  $name1=$_POST['name1']; 
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub";
$sno = 1;
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM article WHERE $fie='$name1'";
$result = mysqli_query($connect, $query);

?>


<div class="table-responsive-sm">

<table class="tablesorter" class="table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Title</th>
				<th>Doi</th>
				
			</tr>
		</thead>
		<tbody>
		 <tbody>
           
            <!-- populate table from mysql database -->
           <!-- populate table from mysql database -->
            <?php while($row1 = mysqli_fetch_array($result)):;
			?>
            <tr>
                <td><?php echo $sno;?></td>
                <td><?php echo $row1[1];?></td>
				<td><a href=page7.php?name=<?php echo $row1[6];?> ><?php echo $row1[6];?></a></td>
				
                
            </tr>
            <?php $sno=$sno+1;endwhile;?> 
            
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