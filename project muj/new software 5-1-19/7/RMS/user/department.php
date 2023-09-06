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
    <title>mujpub</title>
	<link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
	<script src="js/lib/chart-js/Chart.bundle.js"></script>
	<script src="utils.js"></script>
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
       <?php 	include 'menu.php';	    ?>
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
			
            
			<?php

									 $j_count=0;
									$c_count=0;
									$bc_count=0;
									$o_count=0;
									$dept=$_GET["dept"];
									$hostname = "localhost";
									$username = "root";
									$password = "";
									$databaseName = "mujpub";
									$sno = 0;
									$connect = mysqli_connect($hostname, $username, $password, $databaseName);
									$query = "SELECT document_type, count(uid) FROM `article` where uid in (SELECT DISTINCT uid FROM author where department='$dept') GROUP BY document_type";
									
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
			<div class="container-fluid">
                <!-- Start Page Content -->
				
				
				<div class="row">
						<div class="col-lg-7 ">
							<div class="card">
							
							<div class="card-two">
                                    <header>
                                        <div class="avatar">
                                            
                                        </div>
                                    </header>

                                    <h3><?php echo $dept?><br></h3>
                                    <div class="desc" >
                                       
									   Manipal University Jaipur, Jaipur, Rajasthan, 
									India <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
								
							</div>	
						</div>	
						<div class="col-sm-4 col-md-5">
							<div class="card">
								<div class="card-title">
								
                              <h4>Yearly Publications</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart81"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					
					

<?php
                                                $hostname = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $databaseName = "mujpub";
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT article.year, count(author.uid) FROM author INNER JOIN article ON author.uid=article.uid where author.department= '$dept' GROUP BY article.year";
                                        
											$result = mysqli_query($connect, $query);
                                                     $rowcount=mysqli_num_rows($result);                                   
                                                while($row1 = mysqli_fetch_array($result)):;
													if($s==$rowcount)
													{$lable=$lable."\"".$row1[0]."\"";
												     $data=$data.$row1[1];}
													else
													{$lable=$lable."\"".$row1[0]."\",";
													 $data=$data.$row1[1].",";
													 }
												   $s=$s+1;
                                                      endwhile;
                                              
										    
												?> 
                                           
                                            
                                    
											

   <script >(function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart81" );
	ctx.height = 140;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				{
					label: "Publications",
					data: [<?php echo $data?>],
					borderColor: "rgba(116, 120, 123, 1)",
					borderWidth: "0",
					backgroundColor: "rgba(116, 120, 123, 1)"
                            }
                        ]
		},
		

 options: {
        "hover": {
            "animationDuration": 0
        },
        "animation": {
            "duration": 1,
            "onComplete": function () {
                var chartInstance = this.chart,
                ctx = chartInstance.ctx;

                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y - 5);
                    });
                });
            }
        },
        legend: {
            "display": true
        },
        tooltips: {
            "enabled": false
        },
        scales: {
            yAxes: [{
                display: true,
                gridLines: {
                    display : true
                },
                ticks: {
                    display: true,
                    beginAtZero:true
                }
            }],
            xAxes: [{
                gridLines: {
                    display : false
                },
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


})( jQuery );
</script>

									

								</div>
								
								
								
								
								
				
				 <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-primary"></i></span>
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
                       
                    <div class="col-md-2">
                        <div class="card p-30">
                            
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-book f-s-40 color-success"></i></span>
                                </div>
								<a href=selected.php?type=Journal >
                                <div class="media-body media-text-right">
                                    <h2><?php echo $j_count; ?></h2>
                                    <p class="m-b-0">     Journals</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-book f-s-40 color-warning"></i></span>
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
                    <div class="col-md-2">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-book f-s-40 color-danger"></i></span>
                                </div>
								<a href='selected.php?type=Book' >
                                <div class="media-body media-text-right">
                                    <h2><?php echo $b_count; ?></h2>
                                    <p class="m-b-0">Books</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
               										
                  <div class="col-md-2">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-book f-s-40 color-primary"></i></span>
                                </div>
								<a href='selected.php?type=Book%20Chapter' >
                                <div class="media-body media-text-right">
                                    <h2><?php echo $bc_count; ?></h2>
                                    <p class="m-b-0">Book Chaptes</p>
                                </div></a>
                            </div>
                        </div>
                    </div>
                


					
                </div>
				
				
					

                <div class="row">
					
            <?php include '../user/plugin/department/year_pub.php';?>		
			<?php include '../user/plugin/department/scopus_pub.php';?>			
			<?php include '../user/plugin/department/sci_pub.php';?>		
			<?php include '../user/plugin/department/top5_au.php';?>
	
				
          		
				
              

                </div>
					

				
               <?php

							$hostname = "localhost";
							$username = "root";
							$password = "";
							$databaseName = "mujpub";
							$sno = 1;
							$connect = mysqli_connect($hostname, $username, $password, $databaseName);
							if(isset($_GET["dept"]))
							{ $dept=$_GET["dept"];
						      
								$query = "SELECT * FROM `article` where uid in (SELECT DISTINCT uid FROM author where department='$dept') and  document_type='Book Chapter'";
							}
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{
							?>
				   <div class="row">
				  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h1>Book Chapters </h1>

                            </div>
							
							<style>
							.esum{
								display:list-item;
								margin-left:1.5em;
								list-style-type:decimal;
							}
							
							</style>
							<div id="editsum">
							 <?php while($row1 = mysqli_fetch_array($result)):;
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
											
										
                            <div class="esum"><span class=tbold">
                              <h6 align="justify">   <?php echo $auth;?>."<?php echo $row1[1];?>".<?php echo $row1[2];?>.<?php echo $row1[3];?>,<?php echo $row1[4];?>,pp.<?php echo $row1[5];?>.<a href='article.php?name=<?php echo $row1[27];?>' >Link</a></td>
							</h6></span>
							</div>
							<?php $sno=$sno+1;endwhile;?> 
							</div>
                        
                        </div>
                    </div>
							<?php }

							$hostname = "localhost";
							$username = "root";
							$password = "";
							$databaseName = "mujpub";
							$sno = 1;
							$connect = mysqli_connect($hostname, $username, $password, $databaseName);
							
							if(isset($_GET["dept"]))
							{ $dept=$_GET["dept"];
						      
								$query = "SELECT * FROM `article` where uid in (SELECT DISTINCT uid FROM author where department='$dept') and  document_type='Journal'";
							}
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{

							?>
					 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h1>Journals </h1>

                            </div>
							
							<style>
							.esum{
								display:list-item;
								margin-left:1.5em;
								list-style-type:decimal;
							}
							
							</style>
							<div id="editsum">
							 <?php while($row1 = mysqli_fetch_array($result)):;
											
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
											
										
                            <div class="esum"><span class=tbold">
                              <h6 align="justify">   <?php echo $auth;?>."<?php echo $row1[1];?>".<?php echo $row1[2];?>.<?php echo $row1[3];?>,<?php echo $row1[4];?>,pp.<?php echo $row1[5];?>. <a href='article.php?name=<?php echo $row1[27];?>' >Link</a></td>
							</h6></span>
							</div>
							<?php $sno=$sno+1;endwhile;?> 
							</div>
                        
                        </div>
                    </div>
							<?php }

							$hostname = "localhost";
							$username = "root";
							$password = "";
							$databaseName = "mujpub";
							$sno = 1;
							$connect = mysqli_connect($hostname, $username, $password, $databaseName);
							if(isset($_GET["dept"]))
							{ $dept=$_GET["dept"];
						      
								$query = "SELECT * FROM `article` where uid in (SELECT DISTINCT uid FROM author where department='$dept') and  document_type='Conference Paper'";
							
							}
							
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{

							?>
					 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h1>Conference </h1>

                            </div>
							
							<style>
							.esum{
								display:list-item;
								margin-left:1.5em;
								list-style-type:decimal;
							}
							
							</style>
							<div id="editsum">
							 <?php while($row1 = mysqli_fetch_array($result)):;
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
											
										
                            <div class="esum"><span class=tbold">
                              <h6 align="justify">   <?php echo $auth;?>."<?php echo $row1[1];?>".<?php echo $row1[2];?>.<?php echo $row1[3];?>,<?php echo $row1[4];?>,pp.<?php echo $row1[5];?>. <a href='article.php?name=<?php echo $row1[27];?>' >Link</a></td>
							</h6></span>
							</div>
							<?php $sno=$sno+1;endwhile;?> 
							</div>
                        
                        </div>
                    </div>
							<?php }

							$hostname = "localhost";
							$username = "root";
							$password = "";
							$databaseName = "mujpub";
							$sno = 1;
							$connect = mysqli_connect($hostname, $username, $password, $databaseName);
							if(isset($_GET["dept"]))
							{ $dept=$_GET["dept"];
						     
								$query = "SELECT * FROM `article` where uid in (SELECT DISTINCT uid FROM author where department='$dept') and  document_type='Review'";
							}
							
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{

							?>
					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h1>Editorial/ Letter/ Review/ Poster Presentation/ Invited Lectures </h1>

                            </div>
							
							<style>
							.esum{
								display:list-item;
								margin-left:1.5em;
								list-style-type:decimal;
							}
							
							</style>
							<div id="editsum">
							 <?php while($row1 = mysqli_fetch_array($result)):;
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
											
										
                            <div class="esum"><span class=tbold">
                              <h6 align="justify">   <?php echo $auth;?>."<?php echo $row1[1];?>".<?php echo $row1[2];?>.<?php echo $row1[3];?>,<?php echo $row1[4];?>,pp.<?php echo $row1[5];?>. <a href='article.php?name=<?php echo $row1[27];?>' >Link</a></td>
							</h6></span>
							</div>
							<?php $sno=$sno+1;endwhile;?> 
							</div>
                        
                        </div>
                    
                    
							</div><?php }?>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
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