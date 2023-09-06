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
                    <div class="col-12">
					<div class="card">
                    <div class="card-body">
					 <li class="nav-label">Search DOI</li>
					 	<?php
						  $title       = "";
						  $author_array = "";
						  $jtitle       = "";
						  $pages        = "";
						  $volume       = "";
						  $issue        = "";
						  $issn   		= "";
						  $isbn  		= "";
						  $url          = "";
						  $year         = "";
						  $type         = "";
						   $citation  = "";
						$doi = (isset($_GET["doi"]) && $_GET["doi"] != "" ? $_GET["doi"] : "");
						

									?>
							</div>
						</div>
					</div>
                </div>
<script>
function validateForm() {
   
  var x3 = document.getElementById("author").value;
  var msg="";
  if (x3 == "") {
    msg=msg+"Author must be filled out";
	alert(msg);
    return false;
  }
  
}
</script>
				 <div class="row">
                    <div class="col-12">
					<div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            
                                        </thead>
										
										
										
											 <tbody>
											 
												<div class="input-group input-group-rounded">
												<form method="GET" name="myForm" action="manual_insert2.php" onsubmit="return validateForm()">
												  <tr> <td>Title</td><td><input class="form-control" type="text" id='title' name="title" value=></td></tr>
												  <tr> <div name="author"> <td>Author  Eg. P.Gupta;M.Goyal;.</td><td><input class="form-control"type="text" id="author" name="author" value="<?php echo $citation;?>"></td> </div> </tr>
												  <tr> <td>Journal/Conference</td> 			<td><input class="form-control"type="text" name="journal" ></td></tr>
												  <tr> <td>Abstract</td> 					<td><input class="form-control"type="text" name="Abstract" value=""></td></tr>
												  <tr> <td>doi</td> 						<td><input class="form-control"type="text" name="doi" value=""></td></tr>
												  <tr> <td>URL</td> 						<td><input class="form-control"type="text" id="url" name="url" value=""></td></tr>
												  <tr> <td>Year</td> 						<td><input class="form-control"type="text" name="year" value=""></td></tr>
												  <tr> <td>Volume</td> 						<td><input class="form-control"type="text" name="volume" value=""></td></tr>
												  <tr> <td>Pages</td> 						<td><input class="form-control"type="text" name="pages" value=""></td></tr>
												  <tr> <td>Affiliation</td> 				<td><input class="form-control"type="text" name="affiliation" value=""></td></tr>
												  <tr> <td>ISSN</td> 						<td><input class="form-control"type="text" name="ISSN" value=""></td></tr>
												  <tr> <td>ISBN</td> 						<td><input class="form-control"type="text" name="ISBN" value=""></td></tr>
												  <tr> <td>Type</td> 				
												  <td>
													  <select name="type" class="form-control input-rounded"  >
													  <?php
													  
													      if($type=="Conference Paper")
														  {echo "<option value=\"Conference Paper\" selected>Conference</option>";}
													   else
													      {echo "<option value=\"Conference Paper\">Conference</option>";}
													  
													   if($type=="Journal")
														  {echo "<option value=\"Journal\" selected>Journal</option>";}
													   else
													      {echo "<option value=\"Journal\">Journal</option>";}
													  
													  if($type=="Book Chapter")
														  {echo "<option value=\"Book Chapter\" selected>Book Chapter</option>";}
													   else
													      {echo "<option value=\"Book Chapter\">Book Chapter</option>";}
													  
													  if($type=="Book")
														  {echo "<option value=\"Book\" selected>Book</option>";}
													   else
													      {echo "<option value=\"Book\">Book</option>";}
													  ?>
														
													  </select>
												   </td>
																	
												  </tr>
												   <tr> <td>Publisher</td><td><input class="form-control"type="text" name="publisher" value=></td></tr>
												   
												  <tr> <td>Indexing SCOPUS</td><td > <div class="col-lg-3">
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="SCOPUS" value="SCOPUS"  >
                                                                                        <span class="css-control-indicator"></span> SCOPUS
																						</label>
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
																						<input type="radio" class="css-control-input" id="val-terms" name="SCOPUS" value="NO"   checked>
                                                                                        <span class="css-control-indicator"></span> NO
																						</label>
																						</div>
												</td></tr>
												 <tr> <td>Indexing SCI</td><td><div class="col-lg-3">
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="SCI" value="SCI"  >
                                                                                        <span class="css-control-indicator"></span> SCI
																						</label>
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
																						<input type="radio" class="css-control-input" id="val-terms" name="SCI" value="NO"   checked>
                                                                                        <span class="css-control-indicator"></span> NO
																						</label>
																						</div>
																						</td></tr>
												 <tr> <td>Indexing ESCI</td><td><div class="col-lg-3">
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="ESCI" value="ESCI"  >
                                                                                        <span class="css-control-indicator"></span> ESCI
																						</label>
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
																						<input type="radio" class="css-control-input" id="val-terms" name="ESCI" value="NO"   checked>
                                                                                        <span class="css-control-indicator"></span> NO
																						</label>
																						</div></td></tr>
												 <tr> <td>Indexing UGC</td><td><div class="col-lg-3">
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="UGC" value="UGC"  >
                                                                                        <span class="css-control-indicator"></span> UGC
																						</label>
																						<label class="css-control css-control-primary css-checkbox" for="val-terms">
																						<input type="radio" class="css-control-input" id="val-terms" name="UGC" value="NO"   checked>
                                                                                        <span class="css-control-indicator"></span> NO
																						</label>
																						</div></td></tr>
												  <tr> <td>Indexing Others</td><td><input class="form-control"type="text" name="OTHER" value="<?php  ?>"></td></tr>
												 
												  
												  
												  
												  <tr> <td>Source</td> 				<td><input class="form-control"type="text" name="source" value="<?php ?>"></td></tr>
												   <input type="submit" class="btn btn-primary m-b-10 m-l-5" value="Insert">
												
												</form>
												</div>
									  
												
												
											</tbody>
												
										</table>
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