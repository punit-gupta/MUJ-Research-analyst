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

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
       
            <!-- End Sidebar scroll-->
         <?php include 'menua.php'; ?>
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
					 <li class="nav-label">Search Query</li>
					 <form method="get" action="">
											<div class="input-group input-group-rounded">
											<input type="text" placeholder="Search Round" class="form-control" name="query" value="<?php 
											
											if(isset($_GET["query"])&&!empty($_GET["query"]))
											{echo $_GET["query"];
												
											}
											else
											{
												echo "select * from author where department like '%Manipal%' and department like '%mechanichal%'";
											}
											?>"  >
											<span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit" value="submit query">
											<i class="ti-search"></i></button></span>
											</div>

											
										</form>
							</div>
						</div>
					</div>
                </div>
				
                <div class="row">
				
                    <div class="col-12">
					<?php
						
					$sno = 1;
					if(isset($_GET["query"])&&!empty($_GET["query"]))
					{$query =$_GET["query"];
					$result = mysqli_query($connect, $query);

					?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Articles</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                	<th>S.No</th>
													<th>Author</th>
													<th>Affiliation</th>
													<th>UID</th>
												</tr>
                                        </thead>
                                       
                                        <tbody>
											 <?php
											 while($row1 = mysqli_fetch_array($result)):;?>
													<tr>
														<td><?php echo $sno;?></td>
														<td><?php echo $row1[0];?></td>
														<td><?php echo $row1[2];?></td>
														<td><a href='update_dept2.php?uid=<?php echo $row1[5];?>'><?php echo $row1[5];?></a></td>
													</tr>
															<?php 
															$sno=$sno+1;
															
															endwhile;?> 
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>
								<form method="get" action="bulk_affiliation1.php">
								<input type=text name='query' value="<?php echo $query;?>" hidden>
								 <select  name="dept" class="form-control input-rounded">
													
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
								<span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit" value="submit query">
											Update Dept</button></span>
								
								</form>
                            </div>
                        </div>
					<?php }?>
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