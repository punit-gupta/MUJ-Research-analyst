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

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
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
			<?php

									 $j_count=0;
									$c_count=0;
									$bc_count=0;
									$o_count=0;
									
									$hostname = "localhost";
									$username = "root";
									$password = "";
									$databaseName = "mujpub1";
									$sno = 1;
									$connect = mysqli_connect($hostname, $username, $password, $databaseName);
									$query = "SELECT document_type, COUNT(*) AS `num` FROM article GROUP BY document_type";
									$result = mysqli_query($connect, $query);
									$sum=0;$o_count=0;$b_count=0;
									while($row1 = mysqli_fetch_array($result)):;
										 if( $row1[0]=='Journal')
											 {$j_count=$row1[1];}
										 if( $row1[0]=='Conference Paper')
											 {$c_count=$row1[1];}
										 if( $row1[0]=='Book Chapter')
											 {$bc_count=$row1[1];}
										 if( $row1[0]=='Book')
											 {$b_count=$row1[1];}
										 if( $row1[0]=='Editorial'||$row1[0]=='Review'||$row1[0]=='Letter')
											 {$o_count=$o_count+$row1[1];}
											 
											 $sum=$sum+$row1[1];
									   endwhile;
									   ?> 
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-cutlery f-s-40 color-primary"></i></span>
                                </div>
								<a href="rallarticle.php">
                                <div class="media-body media-text-right">
                                    <h2><?php echo $sum; ?></h2>
                                    <p class="m-b-0">Total Publication</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
                       
                    <div class="col-md-3">
                        <div class="card p-30">
                            
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
								<a href=selected.php?type=Journal >
                                <div class="media-body media-text-right">
                                    <h2><?php echo $j_count; ?></h2>
                                    <p class="m-b-0">Journals</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
								<a href=selected.php?type=Conference%20Paper >
                                <div class="media-body media-text-right">
                                    <h2><?php echo $c_count; ?></h2>
                                    <p class="m-b-0">Conferences</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
								<a href=selected.php?type=Book >
                                <div class="media-body media-text-right">
                                    <h2><?php echo $b_count; ?></h2>
                                    <p class="m-b-0">Books</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
								<a href=selected.php?type=Book%20Chapter >
                                <div class="media-body media-text-right">
                                    <h2><?php echo $bc_count; ?></h2>
                                    <p class="m-b-0">Book Chaptes</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
               
					
                </div>
                    


                <div class="row">
					
            <?php include '../admin/plugin/year_pub.php';?>		
			<?php include '../admin/plugin/scopus_pub.php';?>			
			<?php include '../admin/plugin/sci_pub.php';?>		
			<?php include '../admin/plugin/top5_au.php';?>
			<?php include '../admin/plugin/dept_pub.php';?>		
              

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


    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>

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