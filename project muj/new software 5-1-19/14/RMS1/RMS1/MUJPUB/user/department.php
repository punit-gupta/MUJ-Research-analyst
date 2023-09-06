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
	
	
	
	 <script src="js/lib/jquery/jquery.min.js"></script>
   
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
	<script src="js/lib/chart-js/Chart.bundle.js"></script>
	<script src="utils.js"></script>
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
<?php

									 $j_count=0;
									$c_count=0;
									$bc_count=0;
									$o_count=0;
									$dept=$_GET["dept"];
									$dept1=urlencode ( $dept );
									$sno = 0;
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
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
			 <div class="row">
				    <?php 	include 'dept_menu.php' ?>

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
				</div>	
					

<?php   $lable = "";
												$data="";
												$s=1;
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

                <!-- Start Page Content -->
				
				<div class="row">
                    
					<?php
                    $query2 = "SELECT COUNT(*) AS `num` FROM article where uid in (SELECT DISTINCT uid FROM author where department='$dept')";                                     											    $result2 = mysqli_query($connect, $query2);
					$result2 = mysqli_query($connect, $query2);
					$row12 = mysqli_fetch_array($result2);
					$totalp =$row12[0];   

					
                    $query2 = "select count(author) from author where department='$dept' and type='MUJ' GROUP by department";                                     											    $result2 = mysqli_query($connect, $query2);
					$result2 = mysqli_query($connect, $query2);
					$row12 = mysqli_fetch_array($result2);
					$author =$row12[0];      

					$query2 = "SELECT COUNT(*) AS `num` FROM article where `index scopus` ='SCOPUS' and uid in (SELECT DISTINCT uid FROM author where department='$dept')";                                     											    $result2 = mysqli_query($connect, $query2);
					$result2 = mysqli_query($connect, $query2);
					$row12 = mysqli_fetch_array($result2);
					$scopus =$row12[0];      
					
					$query2 = "SELECT COUNT(*) AS `num` FROM article where `web` ='WEB' and uid in (SELECT DISTINCT uid FROM author where department='$dept')";                                     											    $result2 = mysqli_query($connect, $query2);
					$result2 = mysqli_query($connect, $query2);
					$row12 = mysqli_fetch_array($result2);
					$ws =$row12[0];   

						
					?> 
					
					<div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-primary"></i></span>
                                </div>
								<a href='selected2d.php?dept=<?php echo $dept1;?>'>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $totalp; ?></h2>
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
                                    <span><i class="fa fa-bookmark f-s-40 color-primary"></i></span>
                                </div>
								<a href='selected2d.php?index=SCOPUS&dept=<?php echo $dept1;?>'>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $scopus; ?></h2>
                                    <p class="m-b-0">SCOPUS</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-bookmark-o f-s-40 color-primary"></i></span>
                                </div>
								<a href='selected2d.php?index=WEB&dept=<?php echo $dept1;?>'>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $ws; ?></h2>
                                    <p class="m-b-0">WEB OF SCIENCE</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 " style="color:#F68A0F"></i></span>
                                </div>
								<a href="">
                                <div class="media-body media-text-right">
                                    <h2><?php echo $author; ?></h2>
                                    <p class="m-b-0">Researchers</p>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
					
					
					
					</div>
                      <div class="row"> 
                    <div class="col-md-3">
                        <div class="card p-30">
                            
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-book f-s-40 color-success"></i></span>
                                </div>
								<a href='selectedd.php?type=Journal&dept=<?php echo $dept1;?>' >
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
                                    <span><i class="fa fa-book f-s-40 color-warning"></i></span>
                                </div>
								<a href='selectedd.php?type=Conference%20Paper&dept=<?php echo $dept1;?> '>
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
                                    <span><i class="fa fa-book f-s-40 color-danger"></i></span>
                                </div>
								<a href='selectedd.php?type=Book&dept=<?php echo $dept1;?>' >
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
                                    <span><i class="fa fa-book f-s-40 color-primary"></i></span>
                                </div>
								<a href='selectedd.php?type=Book%20Chapter&dept=<?php echo $dept1;?>' >
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
			<?php include '../user/plugin/department/popular_journal.php';?>
				
          		
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

</body>

</html>
<!-- Localized -->
