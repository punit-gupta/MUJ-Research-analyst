<html>
  <head>
    <title>Ajax Search Box using PHP and MySQL</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    <style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
</style>
  </head>
  <body>
  
  <?php
			if(isset($_GET["typeahead"]) && isset($_GET["dept1"]))
			{$connect=mysqli_connect("localhost","root","","muj");
				$query="UPDATE `employe` SET `department` = '".$_GET['dept1']."' WHERE name = '".$_GET['typeahead']."';";
				$result = mysqli_query($connect, $query);
				
				
							if($result)
							{ echo $_GET['typeahead']."-updated";
							}
			}
			
			
			
			?>
			
			
    <div class="row">
      
<form method="get" action="#">
    <div class="bs-example">
        <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Type your Query">
    </div>
   <select  name="dept1" class="form-control input-rounded">
													
													<option value="other"  >Other</option>
													<option value="Department of Computer and Communication Engineering, Manipal University Jaipur, Jaipur" >Department of Computer and Communication Engineering</option>
													<option value="Department of Computer Science and Engineering, Manipal University Jaipur, Jaipur">Department of Computer Science and Engineering</option>
													<option value="Department of Information Technology, Manipal University Jaipur, Jaipur">Department of Information Technology</option>
													<option value="Department of Chemical Engineering, Manipal University Jaipur, Jaipur" >Department of Chemical Engineering</option>
													<option value="Department of Civil Engineering, Manipal University Jaipur, Jaipur">Department of Civil Engineering</option>
													<option value="Department of Fine Arts (Applied Art), Manipal University Jaipur, Jaipur" >Department of Fine Arts (Applied Art)</option>
													<option value="Department of Mechatronics Engineering, Manipal University Jaipur, Jaipur">Department of Mechatronics Engineering</option>
													<option value="Department of Mechanical Engineering, Manipal University Jaipur, Jaipur" >Department of Mechanical Engineering</option>
													<option value="Department of Automobile Engineering, Manipal University Jaipur, Jaipur" >Department of Automobile Engineering</option>
													<option value="Department of Electronics & Communication Engineering, Manipal University Jaipur, Jaipur" >Department of Electronics & Communication Engineering</option>
													<option value="Department of Electrical & Electronics Engineering, Manipal University Jaipur, Jaipur" >Department of Electrical & Electronics Engineering</option>
													<option value="Department of Physics, Manipal University Jaipur, Jaipur" >Department of Physics</option>
													<option value="Department of Mathematics & Statistics, Manipal University Jaipur, Jaipur" >Department of Mathematics & Statistics</option>
													<option value="Department of Chemistry, Manipal University Jaipur, Jaipur" >Department of Chemistry</option>
													<option value="Department of Biosciences, Manipal University Jaipur, Jaipur" >Department of Biosciences</option>
													<option value="Department of Interior Design, Manipal University Jaipur, Jaipur" >Department of Interior Design</option>
													<option value="Department of Fashion Design	, Manipal University Jaipur, Jaipur" >Department of Fashion Design	</option>
													<option value="Department of Planning, Manipal University Jaipur, Jaipur" >Department of Planning</option>
													<option value="Department of Journalism & Mass Communication, Manipal University Jaipur, Jaipur" >Department of Journalism & Mass Communication</option>
													<option value="Department of Business Administration, Manipal University Jaipur, Jaipur" >Department of Business Administration</option>
													<option value="Department of Hotel Management, Manipal University Jaipur, Jaipur" >Department of Hotel Management</option>
													<option value="Department of Hospitality & Tourism, Manipal University Jaipur, Jaipur ">Department of Hospitality & Tourism </option>
													<option value="TAPMI School of Business, Manipal University Jaipur, Jaipur" >TAPMI School of Business</option>
													<option value=" Department of Commerce, Manipal University Jaipur, Jaipur"> Department of Commerce</option>
													<option value=" School of Humanities & Social Sciences, Manipal University Jaipur, Jaipur" >School of Humanities & Social Sciences</option>
													<option value=" School of Architecture & DesignSchool of Architecture & Design, Manipal University Jaipur, Jaipur" >School of Architecture & Design</option>
								</select>
								<input type='submit'>
								</form>
  
  
  </div>
  </body>
</html>
