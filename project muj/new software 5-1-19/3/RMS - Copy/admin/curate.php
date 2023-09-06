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
					<div class="card">
                    <div class="card-body">
					 <li class="nav-label">Search DOI</li>
									
									<?php
									
									
									$name = (isset($_GET["doi"]) && $_GET["doi"] != "" ? $_GET["doi"] : "10.1109/CSPC.2017.8305885");

									   
									$hostname = "localhost";
									$username = "root";
									$password = "";
									$databaseName = "mujpub1";
									$sno = 1;
									$connect = mysqli_connect($hostname, $username, $password, $databaseName);
									$query = "SELECT * FROM articlec where doi='$name'";
									$result = mysqli_query($connect, $query);

									?>
										<form method="get" action="">
											<div class="input-group input-group-rounded">
											<input type="hidden" name="search" value="">
											<input type="text" placeholder="Search Round" class="form-control" name="doi" value="<?php echo $name; ?>"  >
											<span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit" value="Search DOI">
											<i class="ti-search"></i></button></span>
											</div>

											
										</form>
							</div>
						</div>
					</div>
                </div>
				
		


				 <div class="row">
                    <div class="col-8">
					<div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive m-t-40">
								<form method="GET" action="curate_insrt.php">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            
                                        </thead>
										
										
										
											 <tbody>
											   
												<?php while($row1 = mysqli_fetch_array($result)):;
												     
												?>
												<script>		
												var b=2;

												function myFunction() {
												  var table = document.getElementById("example23");
												  var row = table.insertRow(1+b);
												  var cell1 = row.insertCell(0);
												  var cell2 = row.insertCell(1);
												  cell1.innerHTML = "Author "+b;
												  cell2.innerHTML = "<input class=\"form-control\"type=\"text\" name=\"author"+b+"\"  >";
												  
												   document.getElementById("count").value = b;
												   b=b+1;
												}
												</script>
												<div class="input-group input-group-rounded">
												
												  <tr> <td>Title</td> 				<td><input class="form-control"type="text" name="title" value="<?php echo $row1[1];?>"></td></tr>
												  <tr> <td>Author</td>				<td><input type="button" id="author" value="ADD" onclick="myFunction()"/></td></tr>
												  <?php
												    $query1 = "SELECT * FROM authorc where doi='$row1[6]' ORDER by ord";
														$result1 = mysqli_query($connect, $query1);
														$auth='';
														 $rowcount=mysqli_num_rows($result1);
														 $o=1;
														while($row2 = mysqli_fetch_array($result1)):;
														$rowcount--;
														echo "<tr> <td>Author".$o."</td><td><input class=\"form-control\"type=\"text\" name=\"author".$o."\" value='".$row2[0]."' ></td></tr>";
														$o++;
														endwhile;
												  echo "<script> b=".$o--.";</script>";
												  $doi= $row1[6];
												  $url= $row1[7];
												  ?>
												 
												  <input type="hidden" id=count name="count" value="<?php echo $o;?>">
												  <tr> <td>Abstract</td> 			<td><input class="form-control"type="text" name="Abstract" value="<?php echo $row1[9];?>"></td></tr>												 
												  <tr> <td>journal/Conference</td> 	<td><input class="form-control"type="text" name="journal" value="<?php echo $row1[2];?>"></td></tr>
												  <tr> <td>doi</td> 				<td><input class="form-control"type="text" name="doi" value="<?php echo $row1[6];?>"></td></tr>
												  <tr> <td>URL</td> 				<td><input class="form-control"type="text" name="url" value="<?php echo $row1[7];?>"></td></tr>
												  <tr> <td>Publisher</td> 			<td><input class="form-control"type="text" name="publisher" value="<?php echo $row1[12];?>"></td></tr>
												  <tr> <td>Year</td> 				<td><input class="form-control"type="text" name="year" value="<?php echo $row1[3];?>"></td></tr>
												  <tr> <td>Volume</td> 				<td><input class="form-control"type="text" name="volume" value="<?php echo $row1[4];?>"></td></tr>
												  <tr> <td>Pages</td> 				<td><input class="form-control"type="text" name="pages" value="<?php echo $row1[5];?>"></td></tr>
												  <tr> <td>Affiliation</td> 		<td><input class="form-control"type="text" name="affiliation" value="<?php echo $row1[8];?>"></td></tr>
												  <tr> <td>ISSN</td> 				<td><input class="form-control"type="text" name="ISSN" value="<?php echo $row1[13];?>"></td></tr>
												  <tr> <td>ISBN</td> 				<td><input class="form-control"type="text" name="ISBN" value="<?php echo $row1[14];?>"></td></tr>
												  <tr> <td>Type</td> 				
												  <td>
													  <select name="document_type" class="form-control input-rounded"  >
													  <?php
													  
													      if($row1[17]=="Conference Paper")
														  {echo "<option value=\"Conference Paper\" selected>Conference</option>";}
													   else
													      {echo "<option value=\"Conference Paper\">Conference</option>";}
													  
													   if($row1[17]=="Journal")
														  {echo "<option value=\"Journal\" selected>Journal</option>";}
													   else
													      {echo "<option value=\"Journal\">Journal</option>";}
													  
													  if($row1[17]=="Book Chapter")
														  {echo "<option value=\"Book Chapter\" selected>Book Chapter</option>";}
													   else
													      {echo "<option value=\"Book Chapter\">Book Chapter</option>";}
													  
													  if($row1[17]=="Book")
														  {echo "<option value=\"Book\" selected>Book</option>";}
													   else
													      {echo "<option value=\"Book\">Book</option>";}
													  ?>
														
													  </select>
												   </td>
																	
												  </tr>
												  <tr> <td>Indexing SCOPUS</td><td><input class="form-control"type="text" name="SCOPUS" value="<?php echo $row1[19];?>"></td></tr>
												 <tr> <td>Indexing SCI</td><td><input class="form-control"type="text" name="SCI" value="<?php echo $row1[20];?>"></td></tr>
												 <tr> <td>Indexing ESI</td><td><input class="form-control"type="text" name="ESCI" value="<?php echo $row1[21];?>"></td></tr>
												 <tr> <td>Indexing UGC</td><td><input class="form-control"type="text" name="UGC" value="<?php echo $row1[22];?>"></td></tr>
												  <tr> <td>Indexing Others</td><td><input class="form-control"type="text" name="OTHER" value="<?php echo $row1[23];?>"></td></tr>
												 
												  
												  
												  
												  <tr> <td>Source</td> 				<td><input class="form-control"type="text" name="source" value="<?php echo $row1[18];?>"></td></tr>
												  <input type="submit" class="btn btn-primary m-b-10 m-l-5" value="Update">
												
												
												</div>
									   <?php ;endwhile;?> 
												
												
											</tbody>
												
										</table></form>
									</div>		
									   
							</div>
					</div>					
					</div>
					
					<script>
function popitup(url) {
        newwindow=window.open(url,'name','width=800,height=600');
        if (window.focus) {newwindow.focus()}
        return false;
    }
</script>
									
					<div class="col-4">
					<div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <th colspan="2">Check Online Result</th>
                                        </thead>
										
										
										
											 <tbody>
											 
												<div class="input-group input-group-rounded">
												<tr> <td>URLS</td> 				<td><a href="<?php echo $url;?>" onclick="return popitup('<?php echo $url;?>')" ><?php echo $url;?></a></td></tr>
												<tr> <td>Check DOI</td> 				<td><a href="../user/manual_doi.php?doi=<?php echo $doi;?>" onclick="return popitup('../user/manual_doi.php?doi=<?php echo $doi;?>')" ><?php echo $doi;?></a></td></tr>
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