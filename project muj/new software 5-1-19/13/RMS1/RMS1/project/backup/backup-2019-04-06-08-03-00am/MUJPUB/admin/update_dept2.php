<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title><?php session_start(); echo "".$_SESSION["project"]; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<head>
    <title>Ajax Search Box using PHP and MySQL</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search1.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    <style type="text/css">

.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	text-align: left;
	
}


</style>
  </head>
<script>
function popitup(url) {
        newwindow=window.open(url,'name','width=800,height=600');
        if (window.focus) {newwindow.focus()}
        return false;
    }
</script>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
       
            <!-- End Sidebar scroll-->
         <?php include 'menua.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
					<div class="card">
                    <div class="card-body">
					 <li class="nav-label">Search UID</li>
									
									<?php
									
									
									$name = (isset($_GET["uid"]) && $_GET["uid"] != "" ? $_GET["uid"] : "");

									   
									
									$sno = 1;
									
									$query = "SELECT * FROM article where uid='$name'";
									$result = mysqli_query($connect, $query);

									?>
										<form method="get" action="">
											<div class="input-group input-group-rounded">
											<input type="text" placeholder="Search Round" class="form-control" name="uid" value="<?php echo $name; ?>"  >
											<span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit" value="Search DOI">
											<i class="ti-search"></i></button></span>
											</div>

											
										</form>
							</div>
						</div>
					</div>
                </div>
				 <div class="row">
                    <div class="col-6" id='left'>
					<div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive m-t-40">
                                    <table border=1 cellspacing="0" width="40%">
                                        <thead>
                                            
                                        </thead>
										
										
										
											 <tbody>
											   
												<?php $url="";
												while($row1 = mysqli_fetch_array($result)):;
												     $url=$row1[7];
												?>
												<div class="input-group input-group-rounded">
												
												  <tr> <td>Title</td> 				<td><input class="form-control"type="text" name="title" value="<?php echo $row1[1];?>"></td></tr>
												  <tr> <td>doi</td> 				<td><input class="form-control"type="text" name="doi" value="<?php echo $row1[6];?>"></td></tr>
												   <tr> <td>URLS</td> 				<td><a href="<?php echo $row1[7];?>" onclick="return popitup('<?php echo $row1[7];?>')" ><?php echo $row1[7];?></a></td></tr>
    											  <tr> <td>Affiliation</td> 		<td><textarea rows="4" cols="50" align="center"><?php echo $row1[8];?></textarea ></td></tr>
												
												<form action = "update_dept3.php" method = "GET" align=center>
												 <?php
												 $query1 = "SELECT * FROM author where uid='$row1[27]'";
														$result1 = mysqli_query($connect, $query1);
														$auth='';
														 $rowcount=mysqli_num_rows($result1);
														 $o=0;
														while($row2 = mysqli_fetch_array($result1)):;
																											
														$auth=$row2[0];
														$o=$o+1;
													?>	
														
												  <tr>
												  <td><?php echo $auth;?></td>
												  <td>
												  <?php
												  $a=$row2[2];?>
										  <div class="input-group input-group-rounded">	
										  <input type="hidden"  name="uid" value="<?php echo $row1[27];?>">
										  
										  <input type="hidden"  name="aname<?php echo $o;?>" value="<?php echo $auth;?>">
										  <table>
										  <tr><td>
										  <select onchange="val<?php echo $o;?>()" id="dept<?php echo $o;?>1" name="dept<?php echo $o;?>" class="form-control input-rounded">
													
													<option value="NA"  >Other</option>
													<?php 
													
													 $query = "SELECT * FROM `departments` "; 
													 $result = mysqli_query($connect, $query);
                                                                                       
														while($row1 = mysqli_fetch_array($result)):;
													  echo "<option value='".$row1[0]."' >".$row1[0]."</option>";
                                                      endwhile;
													
													?>
													</select>
													
      
  
													</td></tr>
													<tr><td>
																								
													  <input type="text" id="name<?php echo $o;?>1" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false"  placeholder="Type your Query"></td></tr>
													<tr><td>
													<input type="text" id="aname<?php echo $o;?>1" name="aname<?php echo $o;?>1" value="<?php echo $row2[2];?>" style="width:100%;">
													</td></tr>
													</table>
												<script>
												document.getElementById('name<?php echo $o;?>1').style.display = 'none';
												
												function val<?php echo $o;?>() {
													d = document.getElementById("dept<?php echo $o;?>1").value;
												
													 if (d.localeCompare("NA")) {
																document.getElementById('aname<?php echo $o;?>1').style.display = 'none';
																document.getElementById('name<?php echo $o;?>1').style.display = 'block';
															}
															else 
															document.getElementById('aname<?php echo $o;?>1').style.display = 'block';
															
														}
												</script>
										 
										
										  </div>
										</td>
												  </tr>
												<?php 
												$dept=array("","","","","","","","","","","","","","","","","","","","","","","","","");
												endwhile;
												 ?>
												 <input type="hidden"  name="count" value="<?php echo $o;?>">
												 <input type="submit" class="btn btn-primary m-b-10 m-l-5" value="Insert">
												 </form>
												</div>
												
									   <?php ;endwhile;?> 
												
												 
											</tbody>
												
										</table>
									</div>		
									   
							</div>
					</div>					
					</div>
					<div class="col-sm-6 col-md-15" id='right' height='1000px'>
					<div class="card">
                            <div class="card-body">
							<iframe src='<?php echo $url;?>' width="100%" height="1200px">
							<p>Your browser does not support iframes.</p>
							</iframe>
					</div>
					</div>
					</div>
					<script>
					          var offsetHeight = document.getElementById('left').offsetHeight;
								document.getElementById('right').style.height = '2000px';
					</script>
					</div>
			</div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
   
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
<!-- Localized -->