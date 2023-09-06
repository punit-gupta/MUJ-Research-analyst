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
    <title>MUJPUB</title>
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

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
       
            <!-- End Sidebar scroll-->
        <?php include 'menu.php';?>
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
					 <li class="nav-label">Group BY</li>
										
										
					 <li class="nav-label">Search unique [Journal]</li>
										<form action = "<?php $_PHP_SELF ?>" method = "POST" align=center>
											<div class="input-group input-group-rounded">	
										 <select name="field" class="form-control input-rounded">
											
											<option value="journal">Journal</option>
											<option value="year">Year</option>
											<option value="document_type">Document_type</option>
											<option value="source">Source</option>
										  </select>
										  
										  
										  
										  <input type="text" placeholder="Search Here" class="form-control" name="name1" required>
											<span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit" value="Search DOI">
											<i class="ti-search"></i></button></span>
											
											
										  </div>
										</form>
										
						
							</div>
						</div>
					</div>
                </div>
				 <div class="row">
                    <div class="col-12">
					<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Search Output...</h4>
								
										
										
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
									
									$query = "SELECT $field, COUNT(*) AS `num` FROM article WHERE $field like '%$name1%' GROUP BY $field";
									$result = mysqli_query($connect, $query);

									?>


															
								<h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
												<th><?php echo $field;?></th>
												<th>Count</th>
												</tr>
                                        </thead>
											 <tbody>
											   
												<!-- populate table from mysql database -->
												<?php while($row1 = mysqli_fetch_array($result)):;
												?>
												<tr>
													<td><?php echo $sno;?></td>
													<form id="myForm<?php echo $sno;?>" action="updatej.php" method="POST">
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
							</div>
					</div>					
					</div>
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
    <script src="js/lib/jquery/jquery.min.js"></script>
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