<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Autocomplete with Dynamic Data Load using PHP Ajax</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
	<style>
.typeahead { border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;border-bottom:#CCC 1px solid;;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #D3D3D3;
		outline: 0;
	}
	</style>	
</head>
<body>

	<div >
	<form methord='get' action=#>
		<label class="demo-label">Search Country:</label><br/> <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/>
		<input type=submit value="sumbit">
		</form>
		<?php
        
		$connect =new mysqli('localhost', 'root', '' , 'muj');
		if(isset($_GET['txtCountry']))	
		{$name=$_GET['txtCountry'];
			$query = "select * from employe where name='$name'";
			$result = mysqli_query($connect, $query);
			
			while($row = mysqli_fetch_array($result)):;
			echo $row['empcode']."-".$row['name1'];
			endwhile;
		}
		?>
		</div>

</body>
<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server2.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</html>