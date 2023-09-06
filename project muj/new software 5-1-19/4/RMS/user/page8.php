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
    <title>mujpub1</title>
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
         <?php 
		if(isset($_GET["user"]) )
		{if($_GET["user"]=="admin")
			include '../admin/menua.php'; 
		}
		else
		{include 'menu.php';}
	    ?>
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
						if( !isset($_POST['field'])&&!isset($_POST['name1'])) 
					   {
						   
					   }
					   else{
						  $field=$_POST['field']; 
						  $name1=$_POST['name1']; 
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$databaseName = "mujpub1";
					$sno = 1;
					$connect = mysqli_connect($hostname, $username, $password, $databaseName);
					$query = "SELECT * FROM article WHERE $field='$name1'";
					$result = mysqli_query($connect, $query);

					?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Articles</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
											 <?php


														while($row1 = mysqli_fetch_array($result)):;
														$query1 = "SELECT * FROM author where uid='$row1[27]' ORDER by ord";
													$result1 = mysqli_query($connect, $query1);
													$auth='';
													 $rowcount=mysqli_num_rows($result1);
													 $o=1;
													while($row2 = mysqli_fetch_array($result1)):;
														if($rowcount==$o &$rowcount!=1 )
													{
													$auth=$auth."and ".$row2[0];
													
													}
													else if($o==1)
													{
												     $auth=$row2[0];
													 }
													else
													{$auth=$auth.",".$row2[0];
													}
													$o++;
																
																endwhile;
														?>
													<tr>
														<td><?php echo $sno;?></td>
														<td><?php echo $row1[1];?></td>
														<td><?php echo $auth;?></td>
														<td><?php echo $row1[2];?></td>
														<td><?php echo $row1[3];?></td>
														<td><a href=article.php?name=<?php echo $row1[27];?> ><?php echo $row1[6];?></a></td>
														<td><?php echo $row1[17];?></td>
													</tr>
													<?php $sno=$sno+1;endwhile;?> 
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>
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