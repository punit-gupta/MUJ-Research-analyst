
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
</head>
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

<?php
$name = (isset($_GET["doi"]) && $_GET["doi"] != "" ? $_GET["doi"] : "10.1109/CSPC.2017.8305885");

   
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub";
$sno = 1;
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM article where doi='$name'";
$result = mysqli_query($connect, $query);

?>
<style>
  * { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; } 
  
  input[type="text"] { width: 50em; }
 
</style>

<center>
<form method="get" action="">
<input type="text" name="doi" value="<?php echo $name ?>">
<input type="submit" value="Search DOI">
</form>
</center>

<div class="table-responsive-sm">

<table class="tablesorter" class="table">
		<thead>
			
		</thead>
		 <tbody>
           
            <!-- populate table from mysql database -->
            <?php while($row1 = mysqli_fetch_array($result)):;
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
			
			<form method="get" action="">
            <tr>   <td>Title</td> 				<td><input type="text" name="title" value="<?php echo $row1[1];?>"></td></tr>
              <tr> <td>Author</td> 				<td><input type="text" name="author" value="<?php echo $auth;?>"></td></tr>
              <tr> <td>journal/Conference</td> 	<td><input type="text" name="journal" value="<?php echo $row1[2];?>"></td></tr>
			  <tr> <td>doi</td> 				<td><input type="text" name="doi" value="<?php echo $row1[4];?>"></td></tr>
			  <tr> <td>Year</td> 				<td><input type="text" name="year" value="<?php echo $row1[3];?>"></td></tr>
			  <tr> <td>Affiliation</td> 		<td><input type="text" name="doi" value="<?php echo $row1[8];?>"></td></tr>
			  <tr> <td>ISSN</td> 				<td><input type="text" name="doi" value="<?php echo $row1[13];?>"></td></tr>
			  <tr> <td>ISBN</td> 				<td><input type="text" name="doi" value="<?php echo $row1[14];?>"></td></tr>
			  <tr> <td>Type</td> 				<td><input type="text" name="doi" value="<?php echo $row1[17];?>"></td></tr>
			  <tr> <td>Indexing</td> 			<td><input type="text" name="doi" value="<?php echo $row1[19];?>"></td></tr>
			  <tr> <td>Source</td> 				<td><input type="text" name="doi" value="<?php echo $row1[18];?>"></td></tr>
			   <input type="submit" value="Update">
			   </form>
            </tr>
   <?php ;endwhile;?> 
            
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