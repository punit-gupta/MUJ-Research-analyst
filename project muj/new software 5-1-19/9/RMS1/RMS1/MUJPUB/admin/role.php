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
	
	
	

    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
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
      <?php include 'menua.php';?>
        <!-- End Left Sidebar  -->
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
					<?php
					
						$sno = 1;
						
					$query = "SELECT * FROM prevlages ";
					$result = mysqli_query($connect, $query);

					
					
					
					?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Articles</h4>
							
                              
                                <div class="table-responsive m-t-40">
                                    <table id="" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            
												<th>Role</th>
												<th>Home</th>
												<th>search</th>
												<th>Add Pub</th>
												<th>DoI Search</th>
												<th>Curate</th>
												<th>Report Gen</th>
												<th>Update Article</th>
												<th>Collaborations</th>
												<th>Upload</th>
												<th>Upload Cite</th>
												<th>Delete</th>
												<th>Admin</th>
												<th>Extra</th>
												<th>update</th>
												
												
												
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php while($row1 = mysqli_fetch_array($result)):;
											
											?>
											<tr>
											<form id='d<?php echo $row1[0];?>' method="get" action='changerole.php'>
												<td><?php echo $row1[0];?></td>
												<input type="text" name="role" value='<?php echo $row1[0];?>' hidden>
												<td><input type="checkbox" name="f1" <?php if($row1[1]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f2" <?php if($row1[2]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f3" <?php if($row1[3]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f4" <?php if($row1[4]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f5" <?php if($row1[5]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f6" <?php if($row1[6]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f7" <?php if($row1[7]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f8" <?php if($row1[8]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f9" <?php if($row1[9]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f10" <?php if($row1[10]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f11" <?php if($row1[11]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f12" <?php if($row1[12]==1){echo"checked";};?> value="1"></td>
												<td><input type="checkbox" name="f13" <?php if($row1[13]==1){echo"checked";};?> value="1"></td>
												<td><input type="submit" value='update' class="btn btn-primary btn-flat"></td>
											</form>	
												
											</tr>
											<?php $sno=$sno+1;endwhile;?> 
                                          
                                            
                                        </tbody>
                                    </table>
									<script>
							
									</script>
									<br>
									
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="../../index.html">Colorlib</a></footer>
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