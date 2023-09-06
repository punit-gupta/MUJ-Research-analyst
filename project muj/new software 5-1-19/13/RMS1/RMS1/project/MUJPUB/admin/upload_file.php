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
        <?php include 'menua.php';?>
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
					
					<div >
                                   <form  action=""  method="POST" enctype="multipart/form-data">
									
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" >File <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="file" name="image" />
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-lg-4 col-form-label">SCOPUS<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="SCOPUS" value="SCOPUS"  >
                                                                                        <span class="css-control-indicator"></span> SCOPUS
                                                 </label>
												 <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="SCOPUS" value="NO"   checked>
                                                                                        <span class="css-control-indicator"></span> NO
                                                 </label>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-lg-4 col-form-label">SCI<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="SCI" value="SCI"  >
                                                                                        <span class="css-control-indicator"></span> SCI
                                                 </label>
												 <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="SCI" value="NO"  checked>
                                                                                        <span class="css-control-indicator"></span> NO
                                                 </label>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="col-lg-4 col-form-label">ESCI<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="ESCI" value="ESCI"  >
                                                                                        <span class="css-control-indicator"></span> ESCI
                                                 </label>
												 <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="ESCI" value="NO"  checked>
                                                                                        <span class="css-control-indicator"></span> NO
                                                 </label>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="col-lg-4 col-form-label">UGC<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="UGC" value="UGC"  >
                                                                                        <span class="css-control-indicator"></span> UGC
                                                 </label>
												 <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                                                        <input type="radio" class="css-control-input" id="val-terms" name="UGC" value="NO"  checked>
                                                                                        <span class="css-control-indicator"></span> NO
                                                 </label>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <div class="col-lg-8 ml-auto" id="submit">
                                                <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
                                            </div>
                                        </div>
									</form>	
										
										
					<?php
   if(isset($_FILES['image'])&&isset($_POST['SCOPUS'])&&isset($_POST['SCI'])&&isset($_POST['ESCI'])&&isset($_POST['UGC'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
	$scopus=$_POST['SCOPUS'];
	  $sci=$_POST['SCI'];
	  $esci=$_POST['ESCI'];
	  $ugc=$_POST['UGC'];
	  
      $expensions= array("jpeg","jpg","bib");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "file uploaded Success";
		 ?><a href=upload_file2.php?name=<?php echo"uploads/".$file_name."&SCOPUS=".$scopus."&SCI=".$sci."&ESCI=".$esci."&UGC=".$ugc;?>> MOVE TO NEXT STEP
		 </a><?php
      }else{
         print_r($errors);
      }
   }
?>					
				



						

						
							
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
