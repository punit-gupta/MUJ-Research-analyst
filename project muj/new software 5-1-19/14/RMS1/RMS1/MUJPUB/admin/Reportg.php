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
        <?php 	include 'menua.php';	    ?>
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
			<form  method="get">
              <div class="row">
			  
			 					<div class="col-lg-6 ">
							<div class="card">
							<div class="card-title">
                                <h4>Select Columns </h4>

							<div class="input-group input-group-rounded">
							
							<input type="text" name="report" value="yes" hidden>
							<div class="table-responsive">

							<table  id="myTable">
							  <tr >
							  <td><input type="checkbox" name="Title" value="Title"  checked>Title</td>
							  <td><input type="checkbox" name="author" value="author"  checked>author</td>
							  <td><input type="checkbox" name="jc" value="journal/conference">journal/conference</td>
							  </tr>
							  <tr  >
							  <td><input type="checkbox" name="doi" value="doi">doi</td>
							  <td><input type="checkbox" name="page" value="page">page</td>
							  <td><input type="checkbox" name="volume" value="volume">volume</td>
							  </tr>
							  <tr  >
							  <td><input type="checkbox" name="year" value="year">year</td>
							  <td><input type="checkbox" name="issn" value="issn">issn</td>
							  <td><input type="checkbox" name="isbn" value="isbn">isbn</td>
							  </tr>
							  <tr >
							  <td><input type="checkbox" name="indexing" value="indexing">indexing</td>
							  <td><input type="checkbox" name="affiliation" value="affiliation">affiliation</td>
							  <td><input type="checkbox" name="citation" value="citation">citation</td>
							  </tr>
							 </table>  
							  </div>
							
							
                        </div>

								
							</div>	
							
					</div>
					</div>
				
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Filters</h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#year" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Year</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#indexing" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Indexing</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dept" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Department</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#type" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Article Type</span></a> </li>
                       
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="year" role="tabpanel">
                                        <div class="p-20">
                                            <input type="checkbox" name="2013" value="2013">2013
											<input type="checkbox" name="2014" value="2014">2014
											<input type="checkbox" name="2015" value="2015">2015
											<input type="checkbox" name="2016" value="2016">2016
											<input type="checkbox" name="2017" value="2017">2017
											<input type="checkbox" name="2018" value="2018">2018
											<input type="checkbox" name="2019" value="2019">2019
											<input type="checkbox" name="2020" value="Title">2020
                                        </div>
                                    </div>
									<div class="tab-pane p-20" id="indexing" role="tabpanel">
											<input type="checkbox" name="SCOPUS" value="SCOPUS">SCOPUS
											<input type="checkbox" name="SCI" value="SCI">SCI
											<input type="checkbox" name="ESCI" value="ESCI">ESCI
											<input type="checkbox" name="UGC" value="UGC">UGC
											<input type="checkbox" name="OTHER" value="OTHER">OTHER
									</div>
                                    <div class="tab-pane  p-20" id="dept" role="tabpanel">
									<?php 
									$s=1;
									 $query = "SELECT * FROM `departments` "; 
									$result = mysqli_query($connect, $query);
                                    while($row1 = mysqli_fetch_array($result)):;
														
									echo"<input type=\"checkbox\" name=\"D".$s."\" value='".$row1[0]."'>".$row1[0]."<br>";
                                   $s++;
								   endwhile;
									
									?>
									
									
									
									
									
									</div>
                                    <div class="tab-pane p-20" id="type" role="tabpanel">
									
									<input type="checkbox" name="JOURNAL" value="JOURNAL">JOURNAL
									<input type="checkbox" name="CONFERENCE" value="CONFERENCE">CONFERENCE
									<input type="checkbox" name="BOOK" value="BOOK">BOOK
									<input type="checkbox" name="BOOKC" value="BOOK CHAPTER">BOOK CHAPTER
									<input type="checkbox" name="OTHER" value="OTHER">OTHER
									
									</div>
									
                                </div>
								
								
                            </div>
                        </div>
                    </div>
					 
				</div>

				<div class="row">
					<div class="col-lg-12 ">
					<div class="card">
					<center> <span class="input-group-btn"><button class="btn btn-primary " value="Search DOI"  onclick="myFunction()">
						Generate Report</button></span></center>
							</form>
					</div>
					</div>
				</div>
						
						
				<div class="row">
					<div class="col-lg-12 ">
					
						        <?php
								if(isset($_GET["report"]))
								include 'Reportg1.php';	
							?>
					</div>
				</div>
					
				

						<script>
								

								var i=0;
function myFunction() {
	i++;
var e = document.getElementById("1");
var strUser = e.options[e.selectedIndex].text;


  var row = document.getElementById("example22");
  var x = row.insertCell(i);
  x.innerHTML = strUser;
  var row = document.getElementById("example21");
  var x = row.insertCell(i);
  x.innerHTML = "";
}
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