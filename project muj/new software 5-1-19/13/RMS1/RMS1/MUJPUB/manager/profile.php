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
    <!-- HTML5 Shim and Respond.js IE8 supp
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
      <?php 	include 'menua.php';	    ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
					<?php
						if($_GET['id']!="") 
					   {
						  
						  $name1=$_GET['id'];
											  
					
					$sno = 1;
					
					$query3 = "SELECT * FROM employe WHERE empcode='$name1'";
					//echo $query3;
					$name="";
					$gs="";
					$result3 = mysqli_query($connect, $query3);	
						while($row3 = mysqli_fetch_array($result3)):;
						$dept=$row3[2];
						$name=$row3[1];
						$gs=$row3[7];
						$or=$row3[8];
						$sc=$row3[9];
						$email=$row3[6];
						
						endwhile;
						
						
					?>
					
					<div class="row">
						<div class="col-lg-7 ">
							<div class="card">
							
							<div class="card-two">
                                    <header>
                                        <div class="avatar">
                                            
                                        </div>
                                    </header>

                                    <h3 style="color: orange;"><?php echo $name;?></h3>
									
                                    <div class="desc" >
                                       <?php echo $dept; 	?><br>
									   Manipal University Jaipur, Jaipur, Rajasthan, 
									India <i class="fa fa-envelope">&nbsp; <?php echo $email;?></i>
                                    </div>
									 <div class="contacts">
									 <?php if($gs!='')
									 {?>
                                        <a href="<?php echo $gs;?>"><img src="images/scholar.png" height=30 width=30 ></a>
									 <?php  }
									 if($or!='')
									 {?> <a href="<?php echo $or;?>"><img src="images/download1.png" height=30 width=30 ></a>
									 <?php }
									 if($sc!='')
									 {?> 
									<a href="<?php echo $sc;?>"><img src="images/download.jpg" height=30 width=30 ></a>
									 <?php
									 }?>
								 <div class="clear"></div>
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
                                                
                                                $lable = "";
												$data="";
												$s=1;
                                               
                                                $query = "SELECT article.year, count(author.uid) FROM author INNER JOIN article ON author.uid=article.uid where author.emp= '$name1' GROUP BY article.year";
                                        
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
							</div>	
						</div>	
					</div>
				     	<script>
function loadDoc(x,y) {
	
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     y.innerHTML= this.responseText;
    }
  };
  xhttp.open("GET", x, true);
  xhttp.send();
}
</script>    
				
                        <div class="card">
                            <div class="card-body">
							<h1>	Publications</h1>
								
                           	<?php
						
							echo '<div id=\'BOOK\' ></div><script>loadDoc(\'article_cite.php?author2='.$name1.'\',document.getElementById("BOOK")) ;</script>';
							
							
							?>
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