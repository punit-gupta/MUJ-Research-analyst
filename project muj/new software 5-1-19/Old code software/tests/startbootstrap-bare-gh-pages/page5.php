

<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub";
$sno = 1;
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT year, COUNT(*) AS `num` FROM article GROUP BY year";
$result = mysqli_query($connect, $query);

?>
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





<div class="table-responsive-sm">

<table class="tablesorter" class="table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>year</th>
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
				<input type="hidden" name="field" id="hiddenField" value="year"/>
				<td> <a href="#" onclick="document.getElementById('myForm<?php echo $sno;?>').submit();"><?php echo $row1[0];?></a></td>
                </form>
                <td><?php echo $row1[1];?></td>
                
            </tr>
            <?php $sno=$sno+1;endwhile;?> 
            
        </tbody>
			
	</table>
</div>		
    </body>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.footable').footable();
    });
    </script>
</html>