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
						  $title       = "d";
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
						$debug = (isset($_GET["debug"]) ? true : false);
						error_reporting(0);
						function doi_url($doi)
						{
						  return "http://dx.doi.org/" . $doi;
						  //return "http://data.crossref.org/" . $doi;
						}

						function get_curl($url) 
						{ 
						  $curl = curl_init(); 
						  $header[0] = "Accept: application/rdf+xml;q=0.5,"; 
						  $header[0] .= "application/vnd.citationstyles.csl+json;q=1.0"; 
						  $proxy = '172.17.101.14:8080';
						  $proxyauth = 'muj\punitg:Dec@2018';
						  curl_setopt($curl, CURLOPT_URL, $url); 
						  curl_setopt($curl, CURLOPT_PROXY, $proxy);
						  curl_setopt($curl, CURLOPT_PROXYUSERPWD, $proxyauth);
						  curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)'); 
						  curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
						  curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com'); 
						  curl_setopt($curl, CURLOPT_AUTOREFERER, true); 
						  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
						  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
						  curl_setopt($curl, CURLOPT_TIMEOUT, 10); 
						  
						  
						  $json = curl_exec($curl); 
						  curl_close($curl); 
						  return $json; 
						}

						function get_json_array($json)
						{
						  return json_decode($json, true);
						}

						function show_json($json, $debug=false) {
						  if ($debug) {
							echo "<p>" . $json . "</p>";
						  }
						}

						function show_json_array($json_array, $debug=false) {
						  if ($debug) {
							echo "<pre class='json_array'>";
							print_r($json_array);
							echo "</pre>";
						  }
						}						

						
						
						function insert1($json_array, $doi, $doi_url)
						{
						  $GLOBALS['title']        = $json_array["title"];
						  $GLOBALS['title']  = str_replace('\'', ' ',  $GLOBALS['title'] );
						  $GLOBALS['author_array'] = $json_array["author"];
						  $GLOBALS['jtitle']      = $json_array["container-title"];
						  $GLOBALS['pages']       = $json_array["page"];
						  $GLOBALS['volume']      = $json_array["volume"];
						  $GLOBALS['issue']       = $json_array["issue"];
						  $GLOBALS['issn'] 		  = $json_array["ISSN"];
						  $GLOBALS['isbn'] 		  = $json_array["ISBN"];
						  $GLOBALS['url']         =$doi_url;
						  $GLOBALS['year']        = $json_array["issued"]["date-parts"][0][0];

						  $author_array = $json_array["author"];
						  $citation  = "";
						  foreach ($author_array as $author)
						  {$family = $author["family"];
							  
							$given = ($author["given"] ? $author["given"] : "");
							$given = str_replace(".", "", $given);
							$x = explode(" ", $given);
							$given = "";
							foreach ($x as $initial)
							{
							  $given .= $initial[0];
							}
							$given = (strlen($given)>0 ? " " . $given : "");
							$authors[] = $family . $given;
							  
						  }
						  $author_count = count($authors);
						  if ($author_count <= 6)
						  {
							if (trim($authors[$author_count-1]) != "et al") { 
							  $citation .= implode(", ", $authors) . ". ";
							} else {
							  for($i=0; $i<3; $i++) {
								$author_list[] = $authors[$i];
							  }
							  $author_list[] = "et al";
							  $citation .= implode(", ", $author_list) . ". ";
							}
						  } else {
							$current_author = 0;
							foreach($authors as $author)
							{
							  if ($current_author < 3)
							  {
								$author_list[] = $author;
								$current_author++;
							  }
							}
							$author_list[] = "et al";
							$citation .= implode(", ", $author_list) . ". ";
						  }
						  
						  
						  
						  $GLOBALS['citation1']  = $citation;
						}
						$doi_url      = doi_url($doi);
						$json         = get_curl($doi_url);
						$json_array   = get_json_array($json);


					
									
									insert1($json_array, $doi, $doi_url);

									?>
										<form method="get" action="">
											<div class="input-group input-group-rounded">
											<input type="text" placeholder="Search Round" class="form-control" name="doi" value="<?php echo $doi; ?>"  >
											<span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit" value="Search DOI">
											<i class="ti-search"></i></button></span>
											</div>

											
										</form>
							</div>
						</div>
					</div>
                </div>
<script>
function validateForm() {
  var x1 = document.forms["myForm"]["title"].value;
  var x2 = document.forms["myForm"]["author"].value;
  
  if (x1 == "" && x2=="") {
    alert("Name must be filled out");
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
												<form method="GET" name="myForm" action="manual_insert.php" onsubmit="return validateForm()">
												  <tr> <td>Title</td> 						<td><input class="form-control"type="text" name="title" value="<?php echo $title;?>"></td></tr>
												  <tr> <td>Authors </td><td><input class="form-control"type="text" name="author" value="<?php echo $citation1;?>"  ></td></tr>
												  <tr> <td>Journal/Conference</td> 			<td><input class="form-control"type="text" name="journal" value="<?php echo $jtitle;?>"></td></tr>
												  <tr> <td>Abstract</td> 					<td><input class="form-control"type="text" name="Abstract" value=""></td></tr>
												  <tr> <td>doi</td> 						<td><input class="form-control"type="text" name="doi" value="<?php echo $doi;?>"></td></tr>
												  <tr> <td>URL</td> 						<td><input class="form-control"type="text" name="url" value="<?php echo $url;?>"></td></tr>
												  <tr> <td>Year</td> 						<td><input class="form-control"type="text" name="year" value="<?php echo $year;?>"></td></tr>
												  <tr> <td>Volume</td> 						<td><input class="form-control"type="text" name="volume" value="<?php echo $volume;?>"></td></tr>
												  <tr> <td>Pages</td> 						<td><input class="form-control"type="text" name="pages" value="<?php echo $pages;?>"></td></tr>
												  <tr> <td>Affiliation</td> 				<td><input class="form-control"type="text" name="affiliation" value="<?php ?>"></td></tr>
												  <tr> <td>ISSN</td> 						<td><input class="form-control"type="text" name="ISSN" value="<?php echo $issn[0];?>"></td></tr>
												  <tr> <td>ISBN</td> 						<td><input class="form-control"type="text" name="ISBN" value="<?php echo $isbn[0];?>"></td></tr>
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
												   <tr> <td>Publisher</td><td><input class="form-control"type="text" name="publisher" value="<?php ?>"></td></tr>
												   
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