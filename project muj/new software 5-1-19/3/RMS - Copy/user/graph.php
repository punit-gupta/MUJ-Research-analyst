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
						
                    <!-- /# column -->
                    <div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>SCOPUS Article</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart5"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					 <div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>SCI Article</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart6"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
				
					
					 </div>
                <div class="row">
						
                    <!-- /# column -->
                    <div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>SCOPUS Indexed Journals</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					
					<div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>SCOPUS Indexed Conferences</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart1"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					
                    <!-- /# column -->
                </div>
				
				
					
                <!-- /# row -->
                <div class="row">
						
                    <!-- /# column -->
                   
					
					<div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>Book Chapters</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart3"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					 <div class="col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-title">
                              <h4>Books</h4>

                            </div>
                            <div class="sales-chart">
                              <canvas id="singelBarChart2"></canvas>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
					
                    <!-- /# column -->
                </div>
                <!-- /# row -->

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
          
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
	
	<script src="js/lib/chart-js/Chart.bundle.js"></script>
   
<?php
                                                $hostname = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $databaseName = "mujpub1";
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where document_type='Journal' GROUP BY year";
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
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				{
					label: "SCOPUS Journal",
					data: [<?php echo $data?>],
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 255, 0.5)"
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


} )( jQuery );
</script>

<?php
                                              
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where document_type='Conference Paper' and `index scopus`='SCOPUS' GROUP BY year";
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
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart1" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				{
					label: "SCOPUS Conference Paper",
					data: [<?php echo $data?>],
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 255, 0.5)"
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


} )( jQuery );
</script>

<?php
                                              
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where document_type='Book' GROUP BY year";
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
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart2" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				{
					label: "Books",
					data: [<?php echo $data?>],
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 255, 0.5)"
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


} )( jQuery );
</script>

<?php
                                              
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where document_type='Book Chapter' GROUP BY year";
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
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart3" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				{
					label: "Book Chapters",
					data: [<?php echo $data?>],
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 255, 0.5)"
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


} )( jQuery );
</script>




<?php
                                              
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where `index SCI`='SCI' GROUP BY year";
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
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart6" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				{
					label: "SCI Article",
					data: [<?php echo $data?>],
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 255, 0.5)"
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


} )( jQuery );
</script>
<?php
                                              
                                                $lable = "";
												$data="";
												$s=1;
                                                $connect = mysqli_connect($hostname, $username, $password, $databaseName);
                                                $query = "SELECT year, COUNT(*) AS `num` FROM article where `index scopus`='SCOPUS' GROUP BY year";
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
                                           
                                            
                                    
											

   <script >( function ( $ ) {
	"use strict";

	// single bar chart
	var ctx = document.getElementById( "singelBarChart5" );
	ctx.height = 150;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $lable?> ],
			datasets: [
				{
					label: "SCOPUS Article",
					data: [<?php echo $data?>],
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(0, 123, 255, 0.5)"
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


} )( jQuery );
</script>
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